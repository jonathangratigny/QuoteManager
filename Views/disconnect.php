<?php

require '../Models/functions.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//reset session
$_SESSION = array();
$_SESSION['flash']['success'] = 'Logout succeed';

header("Location: ../index.php");
