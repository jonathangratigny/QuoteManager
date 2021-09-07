<?php

require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';

var_dump($_POST);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
var_dump($_SESSION);
