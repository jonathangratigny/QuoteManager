<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require '../Models/database.php';
require '../Models/user.php';
require '../Models/shipping-line.php';
require '../Models/project.php';
require '../Models/port.php';
require '../Models/project-container.php';

$projectObj = new Project();
$shippingLineObj = new ShippingLine();
$showProjectData = $projectObj->showProjectData();

$getShippingLineWithID = $shippingLineObj->getShippingLineWithID($showProjectData->sl_id);
var_dump($getShippingLineWithID->sl_name);

var_dump($showProjectData);
$date_project = $showProjectData->project_created_at;
$date_project = date("F j, Y, g:i a");
