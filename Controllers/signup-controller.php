<?php

require '../Models/functions.php';
require '../Models/database.php';
require '../Models/user.php';
$errors = array();
$userObj = new User();

if (isset($_POST['saveNewAccount'])) {

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z]+$/', $_POST['username'])) {
        $errors['username'] = "Username entry is not valid, no digit allowed.";
    } else {
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
        $errors['password'] = "Password not valid or not matching.";
    }

    if (empty($errors)) {
        $hashUserPassword = $userObj->hashPassword($_POST['password']);
        $newUser = $userObj->InsertUserInDbh($_POST['email'], $_POST['username'], $hashUserPassword);
        $_SESSION['flash']['success'] = 'Account created successfully! Please log you in :-)';
        $_POST = '';
    }
};
