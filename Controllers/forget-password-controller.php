<?php

require '../Models/database.php';
require '../Models/user.php';
require '../Models/functions.php';
require_once '../assets/vendor/autoload.php';

loggedIn();
$userObj = new User();

if (isset($_POST['submit_reset_password']) && empty($_POST['reset_email'])) {
    $_SESSION['flash']['danger'] = 'unknown email';
} else if (isset($_POST['submit_reset_password']) && !empty($_POST['reset_email'])) {
    $reset_token = token(30);

    $user = $userObj->checkDoubleEmail($_POST['reset_email']);
    $resetPassword = $userObj->resetPassword($reset_token, $user['u_id']);
    $_SESSION['flash']['success'] = 'Instructions sent to your email account.';

    if ($_SERVER['SERVER_NAME'] == 'localhost') {
      $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
        ->setUsername('10a77744ad4d57')
        ->setPassword('8c82fd1d5b5ece');
    } else {
      $transport = new Swift_SmtpTransport();
    }

    // // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // // Create a message
    $message = (new Swift_Message('Password Reset'))
      ->setFrom(['john@doe.com' => 'John Doe'])
      ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
      ->setBody('clic <a href="http://localhost:8888/POO/base64/Views/reset.php?id='.$user['u_id'].'&token='.$reset_token.'">here</a> to reset your password', 'text/html');

    // // Send the message
    $result = $mailer->send($message);

    Header("Location: login.php");
    exit();
};