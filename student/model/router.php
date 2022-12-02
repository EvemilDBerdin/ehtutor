<?php

session_start();
require("./backend.php");

if (isset($_POST['choice'])) {
    switch ($_POST['choice']) {
        case 'login':
            $backend = new backend();
            echo $backend->doLogin($_POST['idnumber'], $_POST['password']);
            break;
        case 'register':
            $backend = new backend();
            echo $backend->doRegister($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['idnumber'], $_POST['address'], $_POST['section'], $_POST['fblink'], $_POST['password'], $_POST['confirmPassword']);
            break;
        case 'logout':
            session_unset();
            session_destroy();
            $data['message'] = "success";
            $data['status'] = "200";
            echo json_encode($data);
            break;
        case 'timein':
            $backend = new backend();
            echo $backend->doTimein($_POST['id']);
            break;
        case 'timeout':
            $backend = new backend();
            echo $backend->doTimeout($_POST['id']);
            break;
        case 'get_data':
            $backend = new backend();
            echo $backend->doGet_data($_POST['id']);
            break;
        case 'checkdate':
            $backend = new backend();
            echo $backend->doCheckdate($_POST['id']);
            break;
        default:
            echo "404";
            break;
    }
}

?>
