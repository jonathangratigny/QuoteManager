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

$projectObj = new Project();
$shippingLineObj = new ShippingLine();

if(!isset($_POST['view_project']) || $_POST['view_project'] == '') {
    header('Location: ./dashboard.php');
}

//project data
$showProjectDataWithID = $projectObj->showProjectDataWithID($_POST['view_project'] ?? null);

//containers in this project
$containersDetails = $projectObj->containersDetails($_POST['view_project'] ?? null);

//variable to separate crates per container in view 
$cratePerContainer = $containersDetails[0]['CT_id'] ?? null;