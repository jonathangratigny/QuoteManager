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

resetSession();
$projectObj = new Project();
$shippingLineObj = new ShippingLine();

$showProjectData = $projectObj->showProjectData();
$getShippingLineWithID = $shippingLineObj->getShippingLineWithID($showProjectData->sl_id);
$projectOwnerWithID = $projectObj->projectOwnerWithID($showProjectData->u_id);
$date_project = $showProjectData->project_created_at;
// $date_project = date("F j, Y, g:i a");
$dateDifferenceProjectAndNow = $projectObj->dateDifferenceProjectAndNow();
$getShippingLine = $shippingLineObj->getShippingLine();
$getShippingLineOnproject = $shippingLineObj->getShippingLineOnproject();
