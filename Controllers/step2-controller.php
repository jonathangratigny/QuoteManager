<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';
require '../Models/container-default-value.php';

$errorS2 = array();
$ok = array();


//get the container default value from dbh
$containerObj = new ContainerDefault;
$getContainerData = $containerObj->getContainerData();
$arrayContainerData = json_encode($getContainerData);
var_dump($_POST);
if (isset($_POST)) {
    //kick in error array the empty values from form
    //most of the times, it is the fiels remaining is container
    // foreach ($_POST as $key => $value) {
    //     //STRPOS Find the position of the first occurrence of a substring in a string
    //     //we put all the 'total' in a separate array to handle the crates only
    //     if (strpos($key, 'total', 0) !== false) {
    //         continue;
    //     } 
    //     if (strpos($key, 'max', 0) !== false) {
    //         continue;
    //     } 
    //     //STRLEN Get string length
    //     //we put the empty fields in this array
    //     if (strlen($value) == 0) {
    //         $errorS2[] = $key;
    //     } 
    //     //we put the filled input in this one
    //     if (strlen($value) > 0) {
    //         $ok[] = $key;
    //     }
    // }

    // var_dump($errorS2);
    // var_dump($ok);
}
