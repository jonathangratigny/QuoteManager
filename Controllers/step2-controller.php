<?php

require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';
require '../Models/container-default-value.php';

// var_dump($_POST);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// var_dump($_SESSION);

//get the container default value from dbh
$containerObj = New ContainerDefault;
$getContainerData = $containerObj->getContainerData();
$arrayContainerData = json_encode($getContainerData);

