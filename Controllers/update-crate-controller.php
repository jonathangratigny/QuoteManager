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
require '../Models/project-crate.php';

//to get the id value of the crate
$crateID = isset($_POST['update_crate']) ? $_POST['update_crate'] : $_POST['save_update'];

if(!$crateID) {
    header('Location: ./dashboard.php');
    $_SESSION['flash']['danger'] = "This section is forbidden now.";
}

$crateObj = new Crate();
//to show data in form
$readCrate = $crateObj->readCrate($crateID);

//error management array
$error = array();


if (isset($_POST['save_update'])) {
    if (empty($_POST['project_crate_ref'])) {
        $error[] = 'ref error';
        $_SESSION['flash']['danger'] = 'Please indicate the crate ref.';
    }
    if (empty($_POST['project_crate_length']) || $_POST['project_crate_length'] == 0) {
        $error[] = 'length error';
        $_SESSION['flash']['danger'] = 'Please indicate the crate length, it cannot be null.';
    }
    if (empty($_POST['project_crate_width']) || $_POST['project_crate_width'] == 0) {
        $error[] = 'width error';
        $_SESSION['flash']['danger'] = 'Please indicate the crate width, it cannot be null.';
    }
    if (empty($_POST['project_crate_height']) || $_POST['project_crate_height'] == 0) {
        $error[] = 'height error';
        $_SESSION['flash']['danger'] = 'Please indicate the crate height, it cannot be null.';
    }
    if (empty($_POST['project_crate_gross_weight']) || $_POST['project_crate_gross_weight'] == 0) {
        $error[] = 'weight error';
        $_SESSION['flash']['danger'] = 'Please indicate the crate weight, it cannot be null.';
    }

    if (empty($error)) {
        //to update data in dbh
        $updateCrate = $crateObj->updateCrate(htmlspecialchars($_POST['project_crate_ref']), htmlspecialchars(intval($_POST['project_crate_length'])), htmlspecialchars(intval($_POST['project_crate_width'])), htmlspecialchars(intval($_POST['project_crate_height'])), htmlspecialchars(intval($_POST['project_crate_gross_weight'])), $readCrate[0]['project_crate_id']);
        header("Refresh:5; url=./dashboard.php");
    }
}
//to show data in form
$readCrate = $crateObj->readCrate($crateID);