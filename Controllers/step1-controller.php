<?php

require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';

$portObj = new Port();
$showUniqueCountry = $portObj->showUniqueCountry();
$errorS1 = array();
var_dump($_POST);


if (isset($_POST['step1'])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!empty($_POST['project_owner_ref'])) {
        $_SESSION['project_owner_ref'] = '';
        $_SESSION['project_owner_ref'] = $_POST['project_owner_ref'];
    } else {
        $errorS1['project_owner_ref'] = 'Please Fill Your Local Reference in "My Reference".';
    }

    if (!empty($_POST['project_ref'])) {
        $_SESSION['project_ref'] = '';
        $_SESSION['project_ref'] = $_POST['project_ref'];
    } else {
        $errorS1['project_ref'] = 'Please Fill A Project Reference in "Project Reference".';
    }

    if (!empty($_POST['project_final_customer_name'])) {

        $_SESSION['project_final_customer_name'] = '';
        $_SESSION['project_final_customer_name'] = $_POST['project_final_customer_name'];
    } else {
        $errorS1['project_final_customer_name'] = 'Please Fill A Customer Name in "Final Customer Name".';
    }

    if (!empty($_POST['project_country_dest']) && $_POST['project_country_dest'] != 'none') {
        $_SESSION['project_country_dest'] = '';
        $_SESSION['project_country_dest'] = $_POST['project_country_dest'];
    } else {
        $errorS1['project_country_dest'] = 'Please Select A Country Of Destination.';
    }

    $_SESSION['project_POL'] = '';
    $_SESSION['project_POL'] = $_POST['project_POL'];

    if (isset($_POST['project_POD'])) {
        if ($_POST['project_POD'] != 'none') {
            $_SESSION['project_POD'] = '';
            $_SESSION['project_POD'] = $_POST['project_POD'];
        } else {
            $errorS1['project_POD'] = 'Please Select A Port Of Discharge.';
        }
    }
}
