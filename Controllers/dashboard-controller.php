<?php 
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
require '../Models/database.php';
require '../Models/user.php';
require '../Models/functions.php';

session_start();

var_dump($_SESSION);