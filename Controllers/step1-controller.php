<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../Models/database.php';
require_once '../Models/shipping-line.php';
require_once '../Models/user.php';
require_once '../Models/port.php';
require_once '../Models/project.php';


$portObj = new Port();
$showUniqueCountry = $portObj->showUniqueCountry();

$shippingLineObj = new ShippingLine();
$getShippingLine = $shippingLineObj->getShippingLine();

//error management for view.
$errorS1 = array();

if (isset($_POST['step1'])) {

    if (!empty($_POST['project_owner_ref'])) {
        $_SESSION['project_owner_ref'] = '';
        $_SESSION['project_owner_ref'] = strtoupper(htmlspecialchars($_POST['project_owner_ref']));
    } else {
        $errorS1['project_owner_ref'] = 'Please Fill Your Local Reference in "My Reference".';
    }

    if (!empty($_POST['project_ref'])) {
        $_SESSION['project_ref'] = '';
        $_SESSION['project_ref'] = strtoupper(htmlspecialchars($_POST['project_ref']));
    } else {
        $errorS1['project_ref'] = 'Please Fill A Project Reference in "Project Reference".';
    }

    if (!empty($_POST['project_final_customer_name'])) {
        $_SESSION['project_final_customer_name'] = '';
        $_SESSION['project_final_customer_name'] = strtoupper(htmlspecialchars(($_POST['project_final_customer_name'])));
    } else {
        $errorS1['project_final_customer_name'] = 'Please Fill A Customer Name in "Final Customer Name".';
    }

    if (!empty($_POST['project_shipping_line']) && $_POST['project_shipping_line'] != 'Select A Shipping Line') {
        $_SESSION['project_shipping_line'] = '';
        $_SESSION['project_shipping_line'] = htmlspecialchars($_POST['project_shipping_line']);
        $_SESSION['sl_id'] = '';
        $getShippingLineID = $shippingLineObj->getShippingLineID(htmlspecialchars(($_POST['project_shipping_line'])));
        $_SESSION['sl_id'] = $getShippingLineID['sl_id'];
    } else {
        $errorS1['project_shipping_line'] = 'Please Select A Shipping Line.';
    }

    if (!empty($_POST['project_country_dest']) && $_POST['project_country_dest'] != 'Select A Country') {
        $_SESSION['project_country_dest'] = '';
        $_SESSION['project_country_dest'] = htmlspecialchars($_POST['project_country_dest']);
    } else {
        $errorS1['project_country_dest'] = 'Please Select A Country Of Destination.';
    }

    $_SESSION['project_POL'] = 'Select A Port';
    $_SESSION['project_POL'] = htmlspecialchars($_POST['project_POL']);

    if (isset($_POST['project_POD'])) {
        if ($_POST['project_POD'] != 'none') {
            $_SESSION['project_POD'] = '';
            $_SESSION['project_POD'] = htmlspecialchars($_POST['project_POD']);
            $showIDFromPOD = $portObj->showIDFromPOD($_POST['project_POD']);
            $_SESSION['POD_ID'] = '';
            $_SESSION['POD_ID'] = $showIDFromPOD['port_id'] ?? null;
        } else {
            $errorS1['project_POD'] = 'Please Select A Port Of Discharge.';
        }
    }
    if (empty($errorS1)) {
        header('Location: step2.php');
    }
}
