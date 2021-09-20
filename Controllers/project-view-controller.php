<?php
var_dump($_POST);

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

$projectObj = new Project();
$shippingLineObj = new ShippingLine();

//project data
$showProjectDataWithID = $projectObj->showProjectDataWithID($_POST['view_project'] ?? null);
// var_dump($showProjectDataWithID);


// //containers in this project
// $containersInThisProject = $projectObj->containersInThisProject($_POST['view_project']);
// var_dump($containersInThisProject);


$containersDetails = $projectObj->containersDetails($_POST['view_project'] ?? null);
// var_dump($containersDetails);

foreach ($containersDetails as $value) {

    var_dump($value);
}
