<?php
include("./database.php");
class backend
{
    public function doGetdata()
    {
        return self::getdata();
    } 
    public function doGet_dataById($id)
    {
        return self::get_dataById($id);
    } 
    public function doEditdatabtn($fname,$mname,$lname,$address,$section,$fblink,$id)
    {
        return self::editdatabtn($fname,$mname,$lname,$address,$section,$fblink,$id);
    } 
    public function doDeletedatabtn($id)
    {
        return self::deletedatabtn($id);
    } 
    public function doViewstudentdata($id){
        return self::viewstudentdata($id);
    }
    public function doUd_body_tbl(){
        return self::ud_body_tbl();
    }
    public function doDeleteuserdatabtn($id){
        return self::deleteuserdatabtn($id);
    }
    public function doGet_UserdataById($id){
        return self::get_UserdataById($id);
    } 
    public function doUpdateUserData($fname, $mname, $lname, $email, $address, $zipcode, $tel, $gender, $id){
        return self::updateUserData($fname, $mname, $lname, $email, $address, $zipcode, $tel, $gender, $id);

    }
    private function getdata()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->getdataQuery());
                $stmt->execute(array(0));
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
            return "501";
        }
    }
    private function editdatabtn($fname,$mname,$lname,$address,$section,$fblink,$id)
    {
        try {
            $db = new database(); 
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->editdatabtnQuery()); 
                $result = $stmt->execute(array($fname,$mname,$lname,$address,$section,$fblink,$id));
                if ($result) { 
                    $db->closeConnection();  
                    $data['message'] = "Successfully Updated";
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
            return "501";
        }
    }
    private function deletedatabtn($id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->deletedatabtnQuery());
                $res = $stmt->execute(array(1, $id));
                if ($res) { 
                    $db->closeConnection(); 
                    $data['message'] = "Successfully deleted";
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
            return "501";
        }
    }

    private function get_dataById($id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->get_dataByIdQuery());
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
            return "501";
        }
    }
    
    private function viewstudentdata($id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->viewstudentdataQuery());
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
            return "501";
        }
    }
    
    private function ud_body_tbl()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->ud_body_tblQuery());
                $stmt->execute(array(0));
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
            return "501";
        }
    }
    
    private function deleteuserdatabtn($id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->deleteuserdatabtnQuery());
                $result = $stmt->execute(array($id)); 
                if ($result) { 
                    $db->closeConnection();  
                    $data['message'] = "Successfully deleted";
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
            return "501";
        }
    }
    private function get_UserdataById($id){
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->get_UserdataByIdQuery());
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
            return "501";
        }
    }
    private function updateUserData($fname, $mname, $lname, $email, $address, $zipcode, $tel, $gender, $id){
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->updateUserDataQuery());
                $result = $stmt->execute(array($fname, $mname, $lname, $email, $address, $zipcode, $tel, $gender, $id));
                if ($result) { 
                    $db->closeConnection();  
                    $data['message'] = "Updated Successfully";
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
            return "501";
        }
    }
    private function get_dataByIdQuery(){
        return "SELECT * FROM `student_info` WHERE `id` = ?";
    }
    private function getdataQuery()
    {
        return "SELECT * FROM student_info WHERE `status` = ?";
    }
    private function editdatabtnQuery()
    {
        return "UPDATE `student_info` SET `firstname` = ?, `middlename` = ?, `lastname` = ?, `address` = ?, `section` = ?, `fblink` = ? WHERE `id` = ?";
    }
    private function deletedatabtnQuery()
    {
        return "UPDATE `student_info` SET `status` = ? WHERE `id` = ?";
    }
    private function viewstudentdataQuery()
    {
        return "SELECT * FROM in_out WHERE `student_info_id` = ? AND `is_deleted` = 0 ORDER BY datenow DESC";
    }
    private function ud_body_tblQuery(){
        return "SELECT * FROM users WHERE `status` = ?";
    }
    private function deleteuserdatabtnQuery(){
        return "DELETE FROM users WHERE `users`.`user_id` = ?";
    }
    private function get_UserdataByIdQuery(){
        return "SELECT * FROM `users` WHERE `user_id` = ?";
    } 
    private function updateUserDataQuery(){
        return "UPDATE `users` SET `firstname` = ?, `middlename` = ?, `lastname` = ?, `email` = ?, `address` = ?, `zipcode` = ?, `telephone` = ?, `gender` = ? WHERE `user_id` = ?";
    }
}
