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

if (isset($_POST)) {
    //kick in error array the empty values
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'total', 0) !== false) {
            continue;
        } 
        if (strlen($value) == 0) {
            $errorS2[] = $key;
        } 
        if (strlen($value) > 0) {
            $ok[] = $key;
        }
    }

    var_dump($errorS2);
    var_dump($ok);
}
