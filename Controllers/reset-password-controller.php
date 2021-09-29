<?php

require '../Models/database.php';
require '../Models/user.php';

$userObj = new User();

// if there is ID and token in GET
if (isset($_GET['id']) && isset($_GET['token'])) {
    $checkTokenId = $userObj->checkTokenId($_GET['id'], $_GET['token']);

    //if token is matching
    if (!empty($checkTokenId) == true) {

        if (!empty($_POST)) {
            //check the password are existing and matching
            if (!empty($_POST['update_password']) && $_POST['update_password'] == $_POST['update_password_confirm']) {
                // Validate password strength
                $password = $_POST['update_password'];
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                    session_start();
                    $_SESSION['flash']['danger'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                    header('Refresh:3');
                } else {
                    //then we hash and send user to dashboard
                    $hash_password = $userObj->hashPassword($_POST['update_password']);
                    $updatePasswordByReset = $userObj->updatePasswordByReset($hash_password, $_GET['id']);
                    session_start();
                    $_SESSION['flash']['success'] = 'Password updated successfully! You can login now!';
                }
            } else {
                session_start();
                $_SESSION['flash']['danger'] = 'Password are not matching, please try again.';
                header('Refresh:2');
            }
        }
    } else {
        session_start();
        $_SESSION['flash']['danger'] = 'Link expired, you will be returned to landing page in 3 seconds.';
        header('Refresh:3; ../index.php');
    }
} else {
    header('Location: ../index.php');
    exit();
}
