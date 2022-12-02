<?php

session_start();
require("backend.php");

if (isset($_POST['choice'])) {
    switch ($_POST['choice']) {
        case 'get_data':
            $backend = new backend();
            echo $backend->doGetdata();
            break;
        case 'get_dataById':
            $backend = new backend();
            echo $backend->doGet_dataById($_POST['id']);
            break;
        case 'editdatabtn':
            $backend = new backend(); 
            echo $backend->doEditdatabtn($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['address'], $_POST['section'], $_POST['fblink'], $_POST['hiddenstudentid']);
            break;
        case 'deletedatabtn':
            $backend = new backend();
            echo $backend->doDeletedatabtn($_POST['id']);
            break;
        case 'viewstudentdata':
            $backend = new backend();
            echo $backend->doViewstudentdata($_POST['id']);
            break; 
        case 'ud_body_tbl':
            $backend = new backend();
            echo $backend->doUd_body_tbl();
            break; 
        case 'deleteuserdatabtn':
            $backend = new backend();
            echo $backend->doDeleteuserdatabtn($_POST['id']);
            break;
        case 'get_UserdataById':
            $backend = new backend();
            echo $backend->doGet_UserdataById($_POST['id']);
            break;
        case 'updateUserData':
            $backend = new backend();
            echo $backend->doUpdateUserData($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['email'], $_POST['address'], $_POST['zipcode'], $_POST['telephone'], $_POST['gender'], $_POST['hiddenuserid']);
            break;
        case 'logout':
            session_unset();
            session_destroy();
            $data['status'] = "200";
            echo json_encode($data);
            break;
        default:
            echo "404";
            break;
    }
}
