<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../Models/database.php';
require '../Models/user.php';

