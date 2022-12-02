<?php

include("./database.php");

class backend
{
    public function doLogin($idnumber, $pass)
    {
        return self::login($idnumber, $pass);
    }
    public function doRegister($fname, $mname, $lname, $id, $address, $section, $fblink, $pwd, $cpwd)
    {
        return self::register($fname, $mname, $lname, $id, $address, $section, $fblink, $pwd, $cpwd);
    }
    public function doTimein($id)
    {
        return self::timein($id);
    }
    public function doTimeout($id)
    {
        return self::timeout($id);
    }
    public function doGet_data($id)
    {
        return self::get_data($id);
    }
    public function doCheckdate($id)
    {
        return self::getDate($id);
    }

    private function login($idnumber, $pass)
    {
        try {
            if (!isset($_SESSION['count'])) {
                $_SESSION['count'] = 0;
            }
            $db = new database();
            if ($db->getStatus()) {
                $hashpwd = md5($pass);
                $stmt = $db->getCon()->prepare($this->loginQuery());
                $stmt->execute(array($idnumber, $hashpwd, 0));
                $result = $stmt->fetch();
                if ($result) {
                    $status = (int)$result['status'];
                    if ($status < 2) {
                        $_SESSION['userdata'] = $result;
                        $db->closeConnection();
                        $data['message'] = "You are successfully Logging in!";
                        $data['status'] = "200";
                        unset($_SESSION['count']);
                        return json_encode($data);
                    } else {
                        $data['message'] = "Invalid login";
                        $data['status'] = "404";
                    }
                } else {
                    $chkidnumber = $db->getCon()->prepare($this->checkemailQuery());
                    $chkidnumber->execute(array($idnumber));
                    $res = $chkidnumber->fetch();
                    if (!empty($res)) { 
                        if ($res['idnumber'] == $idnumber) {  
                            if ($res['status'] == 3) {
                                $data['message'] = "Your account has been lock you can contact the admin according to this concern";
                                $data['status'] = "404";
                            } else {
                                if (isset($_SESSION['check_id'])) {
                                    if ($_SESSION['check_id'] == $idnumber) {
                                        $_SESSION['count']++;
                                    } else {
                                        $_SESSION['check_id'] = $idnumber;
                                        $_SESSION['count'] = 0;
                                        $_SESSION['count']++;
                                    }
                                } else {
                                    $_SESSION['check_id'] = $idnumber;
                                    $_SESSION['count']++;
                                }
                                $_SESSION['userid'] = $res['id'];
                                $data['message'] = "Incorrect Password! Attempt " . $_SESSION['count'] . " \r\n--> 3 Attempt and your account will be deactivated!";
                                $data['status'] = "404";
                            }
                        }
                    } else {
                        $_SESSION['count'] = 0;
                        $data['message'] = "ID doesnt exists!";
                        $data['status'] = "404";
                    }
                    if ($_SESSION['count'] >= 3) {
                        $disableEmail = $db->getCon()->prepare($this->updateUserQuery());
                        $rdisableEmail = $disableEmail->execute(array($_SESSION['userid']));
                        if ($rdisableEmail) {
                            session_unset();
                            session_destroy();
                            $data['message'] = "Your account has been deactivated!";
                            $data['status'] = "404";
                        } else {
                            $data['message'] = "ERROR";
                            $data['status'] = "504";
                        }
                    }
                    $db->closeConnection();
                    return json_encode($data);
                }
            } else {
                return "403";
            }
        } catch (PDOException $th) {
            return "501";
        }
    }

    private function register($fname, $mname, $lname, $id, $address, $section, $fblink, $pwd, $cpwd)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {

                if ($pwd == $cpwd) {
                    $hashpwd = md5($pwd);
                    $stmt = $db->getCon()->prepare($this->registerQuery());

                    $res = $stmt->execute(array($fname, $mname, $lname, $id, $address, $section, $fblink, $hashpwd, 0));

                    if ($res) {
                        $db->closeConnection();
                        $data['message'] = "Student are successfully registered";
                        $data['status'] = "200";
                        return json_encode($data);
                    } else {
                        $db->closeConnection();
                        $data['message'] = "Failed";
                        $data['status'] = "404";
                        return json_encode($data);
                    }
                } else {
                    $db->closeConnection();
                    $data['message'] = "Wrong Password.";
                    $data['status'] = "404";
                    return json_encode($data);
                }
            } else {
                return "403";
            }
        } catch (PDOException $th) {
            // return "501";
            return $th;
        }
    }

    private function timein($id)
    {
        try {
            date_default_timezone_set("Asia/Manila");
            $db = new database();
            if ($db->getStatus()) {
                if ($this->getDate($id) == 'true') {
                    $db->closeConnection();
                    $data['message'] = "Failed";
                    $data['status'] = "404";
                    return json_encode($data);
                } else {
                    $stmt = $db->getCon()->prepare($this->timeinQuery());
                    $datenow = date('Y-m-d');
                    if ($stmt) {
                        $temp = array('success', date('Y-m-d h:i:sa'), '', $datenow, $id, 0);
                    } else {
                        $temp = array('failed', date('Y-m-d h:i:sa'), '', $datenow, $id, 0);
                    }
                    $stmt->execute($temp);
                    if ($stmt) {
                        $db->closeConnection();
                        $data['message'] = "You are Time In";
                        $data['status'] = "200";
                        return json_encode($data);
                    } else {
                        $db->closeConnection();
                        $data['message'] = "Failed";
                        $data['status'] = "404";
                        return json_encode($data);
                    }
                }
            } else {
                return "403";
            }
        } catch (PDOException $th) {
            // return "501";
            return $th;
        }
    }

    private function timeout($id)
    {
        try {
            date_default_timezone_set("Asia/Manila");
            $db = new database();
            if ($db->getStatus()) {
                $datenow = date('Y-m-d');
                if ($this->getDate($id) == 'true') {
                    $stmt = $db->getCon()->prepare("SELECT * FROM in_out WHERE `datenow` = ? AND `student_info_id` = ? AND `is_deleted` = ?");
                    $stmt->execute(array($datenow, $id, 0));
                    $result = $stmt->fetchAll();
                    foreach ($result as $key) {
                        if ($key['time_out'] != "") {
                            $db->closeConnection();
                            $data['message'] = "Failed";
                            $data['status'] = "404";
                            return json_encode($data);
                        } else {
                            $stmt = $db->getCon()->prepare($this->timeoutQuery());
                            $stmt->execute(array(date('Y-m-d h:i:sa'), $datenow, $id));

                            if ($stmt) {
                                $db->closeConnection();
                                $data['message'] = "You are time out";
                                $data['status'] = "200";
                                return json_encode($data);
                            } else {
                                $db->closeConnection();
                                $data['message'] = "Failed to time out";
                                $data['status'] = "404";
                                return json_encode($data);
                            }
                        }
                    }
                } else {
                    $db->closeConnection();
                    $data['message'] = "Close Connection";
                    $data['status'] = "404";
                    return json_encode($data);
                }
            } else {
                return "403";
            }
        } catch (PDOException $th) {
            // return "501";
            return $th;
        }
    }

    private function get_data($id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->get_dataQuery());
                $stmt->execute(array($id));
                $result = $stmt->fetchAll();
                if ($result) {
                    $db->closeConnection();
                    return json_encode($result);
                } else {
                    $db->closeConnection();
                    $data['message'] = "Failed";
                    $data['status'] = "404";
                    return json_encode($data);
                }
            } else {
                return "403";
            }
        } catch (PDOException $th) {
            // return "501";
            return $th;
        }
    }

    private function getDate($id)
    {
        date_default_timezone_set("Asia/Manila");
        $db = new database();
        if ($db->getStatus()) {
            $datenow = date('Y-m-d');
            $stmt = $db->getCon()->prepare("SELECT * FROM in_out WHERE `datenow` = ? AND `student_info_id` = ? AND `is_deleted` = ?");
            $stmt->execute(array($datenow, $id, 0));
            $result = $stmt->fetchAll();

            if (!empty($result)) {
                $db->closeConnection();
                return 'true';
            } else {
                $db->closeConnection();
                return 'false';
            }
        } else {
            return "403";
        }
    }

    private function loginQuery()
    {
        return "SELECT * FROM student_info WHERE `idnumber` = ? AND `password` = ? AND `status` = ?";
    }
    private function registerQuery()
    {
        return "INSERT INTO student_info (`firstname`,`middlename`,lastname,idnumber,`address`,section,fblink,`password`,`status`) VALUES (?,?,?,?,?,?,?,?,?)";
    }
    private function timeinQuery()
    {
        return "INSERT INTO in_out (`status`,`time_in`,time_out,datenow,student_info_id,is_deleted) VALUES (?,?,?,?,?,?)";
    }
    private function timeoutQuery()
    {
        return "UPDATE `in_out` SET `time_out` = ? WHERE `datenow` = ? AND `is_deleted` = 0 AND `student_info_id` = ?";
    }
    private function get_dataQuery()
    {
        return "SELECT * FROM in_out WHERE `student_info_id` = ? AND `is_deleted` = 0";
    }
    private function checkemailQuery()
    {
        return "SELECT * FROM student_info WHERE `idnumber` = ?";
    }
    private function updateUserQuery()
    {
        return "UPDATE `student_info` SET `status` = '3' WHERE `student_info`.`id` = ?";
    }
}//End of class backend
