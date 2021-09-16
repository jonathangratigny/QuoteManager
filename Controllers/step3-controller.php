<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // header('Location: index.php');
}
// var_dump($_SESSION);
require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';
require '../Models/project-crate.php';
require '../Models/container-default-value.php';

$crateObj = new Crate();
$projectObj = new Project();
$containerInQuote = array();
$containerID = array();
$crateInContainer = array();
$containerValueWithWhichCrate = array();
$containerIndex = 0;
$crateByContainer = array();
$index = 1;

if (isset($_POST['validate'])) {
    if (!empty($_SESSION['crate_data'])) {

        //insert project crate in dbh
        foreach ($_SESSION['crate_data'] as $crate_data) {
            $pushCrate = $crateObj->pushCrate(
                $crate_data[0],
                intval($crate_data[1]),
                intval($crate_data[2]),
                intval($crate_data[3]),
                intval($crate_data[4]),
                $crate_data[7]
            );
            array_push($crateInContainer, $pushCrate);
        }


        //insert project in dbh
        if (!empty($_SESSION['project_ref'] && $_SESSION['project_final_customer_name'] && $_SESSION['project_owner_ref'] && $_SESSION['project_country_dest'] && $_SESSION['project_POL'] && $_SESSION['project_POD'] && $_SESSION['u_id'] && $_SESSION['sl_id'] && $_SESSION['POD_ID'])) {
            $pushProject = $projectObj->pushProject($_SESSION['project_ref'], $_SESSION['project_final_customer_name'], $_SESSION['project_owner_ref'], $_SESSION['project_country_dest'], $_SESSION['project_POL'], $_SESSION['project_POD'], $_SESSION['u_id'], $_SESSION['sl_id'], $_SESSION['POD_ID']);
        } else {
            $_SESSION['flash']['danger'] = 'An Error Occurs, please try again.';
        }
    }

    //get the quantity of containers in quotation
    foreach ($_SESSION['crate_data'] as $value) {

        // $value[7] = explode('V', $value[7]); // kick the 'V'
        if ($value[7][1] == $index) {
            $containerInQuote[] = 'V' . $value[7][1];
            $index++;
        }
        //get container ID of containers in quotation
        $containerID[] = $value[5];
    }

    //insert project container : which df container for this request
    $project_container_ID = array();
    $getLastProjectID = $projectObj->getLastProjectID();
    foreach ($containerID as $value) {
        $pushProject_container = $projectObj->pushProject_container(intval($value), intval($getLastProjectID['project_id']));
        array_push($project_container_ID, $pushProject_container);
    }

    //IS_STUFF_IN process
    //we have to define in which container is pack which crate
    foreach ($containerInQuote as $value) { //the 'V' value 
        $containerValueWithWhichCrate[$value] = $project_container_ID[$containerIndex]; //V1 = project container ID
        $containerIndex++;
    }


    //we look in 01-V1 array
    foreach ($crateInContainer as $value) {
        $getValueV = explode('-', $value); //take the V value
        $bufferArray = []; //create an array of array where first array [0], [1], [2]...  will be the data for IS_STUFF_IN table filling (and purge it in next loop):
        // array[0]
        //[0] = project_container_id
        //[1] = project_crate_id

        array_push(
            $bufferArray,
            $containerValueWithWhichCrate[$getValueV[1]], //[0] = project_container_id
            $getValueV[0]
        ); //[1] = project_crate_id

        //then once first loop is done, let's go for the next one...
        $crateByContainer[] = $bufferArray;
    }
    foreach ($crateByContainer as $value) {
        $isStuffIn = $projectObj->isStuffIn($value[0], $value[1]);
    }
}
