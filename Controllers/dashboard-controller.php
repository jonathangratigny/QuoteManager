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

$getShippingLineWithID = $shippingLineObj->getShippingLineWithID($showProjectData['sl_id'] ?? null);
$projectOwnerWithID = $projectObj->projectOwnerWithID($showProjectData['u_id'] ?? null);
$dateDifferenceProjectAndNow = $projectObj->dateDifferenceProjectAndNow();


$getShippingLine = $shippingLineObj->getShippingLine() ?? null;
$getShippingLineOnproject = $shippingLineObj->getShippingLineOnproject() ?? null;

if (isset($_POST['delete_project'])) {
    $deleteProject = $projectObj->deleteProject($_POST['delete_project']);
}
$showProjectData = $projectObj->showProjectData();
var_dump($showProjectData);
