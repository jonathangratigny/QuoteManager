<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../Models/functions.php';
require '../Models/database.php';
require '../Models/user.php';
require '../Models/shipping-line.php';
require '../Models/project.php';
require '../Models/port.php';
require '../Models/project-container.php';