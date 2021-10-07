<?php


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../Models/functions.php';
require_once '../Models/database.php';
require_once '../Models/user.php';
require_once '../Models/shipping-line.php';
require_once '../Models/project.php';
require_once '../Models/port.php';
require_once '../Models/container-default-value.php';

resetSession();
$projectObj = new Project();
$shippingLineObj = new ShippingLine();
$containerObj = new ContainerDefault();

//for modal management
$indexModal = 1;

//fetch all project data
$showProjectData = $projectObj->showProjectData();
var_dump($showProjectData);
//get the shipping line name with it's UD
$getShippingLineWithID = $shippingLineObj->getShippingLineWithID($showProjectData['sl_id'] ?? null);


//for shipping line
//get all shipping line data 
$getShippingLine = $shippingLineObj->getShippingLine() ?? null;

//get name and project ref of a shipping line
$getShippingLineOnproject = $shippingLineObj->getShippingLineOnproject() ?? null;

//control to delete a project
if (isset($_POST['delete_project'])) {
    $deleteProject = $projectObj->deleteProject($_POST['delete_project']);
}