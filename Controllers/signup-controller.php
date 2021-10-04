<?php

require '../Models/functions.php';
require '../Models/database.php';
require '../Models/user.php';
$errors = array();
$userObj = new User();
if (isset($_POST['saveNewAccount'])) {

    if(isValid($_POST['g-recaptcha-response']) !== true) {
        $errors['captcha'] = 'Please check the captcha to validate your account.';
    };

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

    if (!empty($_POST['password']) && $_POST['password'] == $_POST['confirm_password']) {
        // Validate password strength
        $password = $_POST['password'];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $errors['password'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
    }

    if (empty($errors)) {
        $hashUserPassword = $userObj->hashPassword($_POST['password']);
        $newUser = $userObj->InsertUserInDbh($_POST['email'], $_POST['username'], $hashUserPassword);
        $_SESSION['flash']['success'] = 'Account created successfully! Please log you in :-)';
        $_POST = '';
    }
};
