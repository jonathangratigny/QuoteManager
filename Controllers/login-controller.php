<?php

require '../Models/functions.php';
require '../Models/database.php';
require '../Models/user.php';

$errors = array();
$userObj = new User();

if (isset($_POST['login'])) {

    if (!empty($_POST['log-username'])) {
        //check hash pwd of user
        $checkPassword = $userObj->checkPassword($_POST['log-username']); 

        if ($checkPassword == true && !empty($_POST['log-password'])) {

            //compare input pwd with hash related to username and login the user
            if (password_verify($_POST['log-password'], $checkPassword['u_password'])) { 
                $logWithEmailUsername = $userObj->logWithEmailUsername($_POST['log-username'], $_POST['log-password']);
                $_SESSION = array();
                $_SESSION['u_id'] = $logWithEmailUsername['u_id'];
                $_SESSION['u_username'] = $logWithEmailUsername['u_username'];
                $_SESSION['u_email'] = $logWithEmailUsername['u_email'];
                header('Location: dashboard.php');
            } else {
                $_SESSION['flash']['danger'] = 'username or password incorrect.';
            }
        } else {
            $_SESSION['flash']['danger'] = 'username or password incorrect.';
        }
    } else {
        $_SESSION['flash']['danger'] = 'username or password incorrect.';
    }
};
