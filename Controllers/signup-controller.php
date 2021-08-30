<?php

require '../Models/functions.php';
require '../Models/database.php';
require '../Models/user.php';


if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z]+$/', $_POST['username'])) {
        $errors['username'] = "The entry is not valid.";
    } else {
        $userObj = new User();
        $checkDoubleUsername = $userObj->checkDoubleUsername($_POST['username']);

        if ($checkDoubleUsername) {
            $errors['username'] = 'Username already exists';
        }
    }
    


    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email isn't valid.";
    } else {
        $userObj = new User();
        $checkDoubleEmail = $userObj->checkDoubleEmail($_POST['email']);

        if ($checkDoubleEmail) {
            $errors['email'] = 'Email already exists.';
        }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']) {
        $errors['password'] = "Password not valid.";
    }

    if (empty($errors)) {
        $hashUserPassword = $userObj->hashPassword($_POST['password']);
        $newUser = $userObj->InsertUserInDbh($_POST['email'], $_POST['username'], $hashUserPassword);
        header( "refresh:5;url=../index.php" );
        echo 'Account created with success. You\'ll be redirected in about 5 secs. If not, click <a href="../index.php">here</a>.';
        die();
    }
    // debug($errors);
};
