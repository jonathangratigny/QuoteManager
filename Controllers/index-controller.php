<?php

require './Models/database.php';
require './Models/user.php';
if (!empty($_POST)) {
    $errors = array();

    if (!empty($_POST['log-username'])) {

        if (!empty($_POST['log-password'])) {
            $userObj = new User();
            $checkPassword = $userObj->checkPassword($_POST['log-username'], '');

            if (password_verify($_POST['log-password'], $checkPassword['u_password'])) {
                $logWithEmailUsername = $userObj->logWithEmailUsername($_POST['log-username'], '');

                session_start();
                $_SESSION['u_id'] = $logWithEmailUsername['u_id'];
                $_SESSION['u_username'] = $logWithEmailUsername['u_username'];
                $_SESSION['u_email'] = $logWithEmailUsername['u_email'];

                header('Location: ./Views/dashboard.php');
                
            } else {
                $errors['log-password'] = 'username or password incorrect.';
            }
        } else {
            $errors['log-password'] = "username or password incorrect.";
        }
    } else {
        $errors['log-username'] = 'username incorrect.';
    }
}
