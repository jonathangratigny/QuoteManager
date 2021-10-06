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
$dataFilled = array();
$totalRow = 0;

//get the container default value from dbh
$containerObj = new ContainerDefault;
$getContainerData = $containerObj->getContainerData();
$arrayContainerData = json_encode($getContainerData);

if (
    !isset($_SESSION['project_POD']) ||
    $_SESSION['project_POD'] == '' ||
    !isset($_SESSION['project_owner_ref']) ||
    $_SESSION['project_owner_ref'] == '' ||
    !isset($_SESSION['project_ref']) ||
    $_SESSION['project_ref'] == ''||
    !isset($_SESSION['project_shipping_line']) ||
    $_SESSION['project_shipping_line'] == '' ||
    !isset($_SESSION['project_country_dest']) ||
    $_SESSION['project_country_dest'] == '' ||
    !isset($_SESSION['POD_ID']) ||
    $_SESSION['POD_ID'] == ''
) {
    header('Location: ./step1.php');
    $_SESSION['flash']['danger'] = 'Please fill step first before accessing to step 2.';
    die();
}

if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        //kick in error array the empty values
        if (strpos($key, 'total', 0) !== false) {
            continue;
        }
        if (strlen($value) == 0) {
            $errorS2[] = $key;
        }
        if (strlen($value) > 0) { // here are data sent by user
            $dataFilled[$key] = $value;
        }
        if (strpos($key, 'crate_ref_R', 0) !== false && strlen($value) != 0) {
            $totalRow++;
        }
    }

    $dimsArray = []; // Array to stack dimensions 
    $start = 1; // allow to get values each steps of 5 (ref, length, width, height, weight)
    if (!empty($dataFilled)) {
        foreach ($dataFilled as $key => $value) {
            // pushing values in intermediary array -> $row
            $row[] = $value;
            // push in array every steps of 5
            if (($start % 5) == 0) {
                // we take back R and V values in last loop by 'exploding' the $key
                $infos = explode('_', $key);
                array_push($row, $infos[5], $infos[6], $infos[7]); // pushing these data in intermediary array
                $dimsArray[] = $row; // fill with the intrmediary array
                $row = []; // then we clean it for next loop
            }
            $start++;
        }
    }

    //pushing data to $_SESSION
    if (!empty($dimsArray)) {
        $_SESSION['crate_data'] = $dimsArray;
        header("Location: ./step3.php");
        die;
    }
};
ob_end_flush();
