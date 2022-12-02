<?php

session_start();
require("backend.php");

if (isset($_POST['choice'])) 
{
    switch ($_POST['choice']) 
    {
        case 'login':
            $backend = new backend();
            echo $backend->doLogin($_POST['email'], $_POST['password']);
            break;
        case 'register':
            $backend = new backend();
            echo $backend->doRegister($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['zipcode'], $_POST['telephone'], $_POST['gender']);
            break;
        case 'logout':
            session_unset();
            session_destroy();
            $data['message'] = "success";
            $data['status'] = "200";
            echo json_encode($data);
            break;
        default:
            echo "404";
            break;
    }
}

?>
