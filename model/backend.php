<?php

include("./database.php");

class backend
{
    public function doLogin($email, $pass)
    {
        return self::login($email, $pass);
    }
    public function doRegister($fname, $mname, $lname, $email, $password, $address, $zipcode, $tel, $gender)
    {
        return self::register($fname, $mname, $lname, $email, $password, $address, $zipcode, $tel, $gender);
    }

    //User's login function
    private function login($email, $pass)
    {
        try {
            if (!isset($_SESSION['count'])) {
                $_SESSION['count'] = 0;
            }
            $db = new database();
            if ($db->getStatus()) {
                $hashpwd = md5($pass);
                $stmt = $db->getCon()->prepare($this->loginQuery());
                $stmt->execute(array($email, $hashpwd));
                $result = $stmt->fetch();
                if ($result) {
                    $status = (int)$result['status'];
                    if ($status < 2) {
                        $_SESSION['admindata'] = $result;
                        $db->closeConnection();
                        $data['message'] = "You are Logging in!";
                        $data['status'] = "200";
                        unset($_SESSION['count']);
                        return json_encode($data);
                    } else {
                        $data['message'] = "Theres an error logging-in in your account";
                        $data['status'] = "404";
                        return json_encode($data);
                    }
                } 
                else {
                    $chkemail = $db->getCon()->prepare($this->checkemailQuery());
                    $chkemail->execute(array($email));
                    $res = $chkemail->fetch();
                    if (!empty($res)) {
                        if ($res['email'] == $email) {
                            if ($res['status'] == 3) {
                                $data['message'] = "Your account has been lock you can contact the admin according to this concern";
                                $data['status'] = "404";
                            } else {
                                if (isset($_SESSION['check_email'])) {
                                    if ($_SESSION['check_email'] == $email) {
                                        $_SESSION['count']++;
                                    } else {
                                        $_SESSION['check_email'] = $email;
                                        $_SESSION['count'] = 0;
                                        $_SESSION['count']++;
                                    }
                                } else {
                                    $_SESSION['check_email'] = $email;
                                    $_SESSION['count']++;
                                }
                                $_SESSION['userid'] = $res['user_id'];
                                $data['message'] = "Incorrect Password! Attempt " . $_SESSION['count'] . " \r\n--> 3 Attempt and your account will be deactivated!";
                                $data['status'] = "404";
                            }
                        }
                    } else {
                        $_SESSION['count'] = 0;
                        $data['message'] = "Email doesnt exists!";
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

    //User's register function
    private function register($fname, $mname, $lname, $email, $password, $address, $zipcode, $tel, $gender)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $hashpwd = md5($password);
                $stmt = $db->getCon()->prepare($this->registerQuery());
                $stmt->execute(array($fname, $mname, $lname, $email, $hashpwd, $address, $zipcode, $tel, $gender));

                if ($stmt) {
                    $db->closeConnection();
                    $data['message'] = "You are successfully registered";
                    $data['status'] = "200";
                    return json_encode($data);
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

    //Queries
    private function loginQuery()
    {
        return "SELECT * FROM users WHERE `email` = ? AND `password` = ?";
    }
    private function registerQuery()
    {
        return "INSERT INTO users (`firstname`,`middlename`,lastname,email,`password`,`address`,zipcode,telephone,gender) VALUES (?,?,?,?,?,?,?,?,?)";
    }
    private function checkemailQuery()
    {
        return "SELECT * FROM users WHERE `email` = ?";
    }
    private function updateUserQuery()
    {
        return "UPDATE `users` SET `status` = '3' WHERE `users`.`user_id` = ?";
    }
}//End of class backend
