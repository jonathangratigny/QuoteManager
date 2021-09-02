<?php

require '../Models/database.php';
require '../Models/user.php';
require '../Models/functions.php';
require_once '../assets/vendor/autoload.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$userObj = new User();


if (isset($_POST['submit_reset_password']) && empty($_POST['reset_email'])) {
  $_SESSION['flash']['danger'] = 'unknown email';
  
} else if (isset($_POST['submit_reset_password']) && !empty($_POST['reset_email'])) {
  $reset_token = token(30);
  $user = $userObj->checkDoubleEmail($_POST['reset_email']);
  $resetPassword = $userObj->resetPassword($reset_token, $user['u_id']);
  $_SESSION['flash']['success'] = "Your password reset email should arrive shortly.<br>If you don't see it, please check your spam folder, sometimes it can end up there!";

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
    ->setFrom(['admin@QuoteManager.com' => 'Admin'])
    ->setTo([$_POST['reset_email']])
    ->setBody('<h3>Forgot your password? No problem!</h3><br><p>You can set a new one now! Click the link below.</p><br><a href="http://localhost:8888/ProjetPro/QuoteManager/Views/reset-password.php?id=' . $user['u_id'] . '&token=' . $reset_token . '"><button type="button">Reset Your Quote Manager Password</button></a><br><p>If you didn\'t request a password reset you can delete this email.</p>', 'text/html');

  // // Send the message
  $result = $mailer->send($message);

  Header("Location: login.php");
  exit();
};
