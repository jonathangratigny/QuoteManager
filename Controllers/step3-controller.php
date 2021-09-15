<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // header('Location: index.php');
}
var_dump($_SESSION);
require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';
require '../Models/project-crate.php';
require '../Models/container-default-value.php';

$crateObj = new Crate();


if (!empty($_SESSION['crate_data'])) {


    foreach ($_SESSION['crate_data'] as $crate_data) {
        $pushCrate = $crateObj->pushCrate
        ($crate_data[0], 
        intval($crate_data[1]), 
        intval($crate_data[2]), 
        intval($crate_data[3]), 
        intval($crate_data[4]));
    }
}
