<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    // header('Location: index.php');
}
require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';
require '../Models/project-crate.php';
require '../Models/container-default-value.php';

$crateObj = new Crate();
$projectObj = new Project();
$containerObj = new ContainerDefault;
$containerInQuote = array();
$containerID = array();
$crateInContainer = array();
$containerValueWithWhichCrate = array();
$containerIndex = 0;
$crateByContainer = array();
$index = 1;

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
    $_SESSION['POD_ID'] == '' ||
    !isset($_SESSION['crate_data']) ||
    $_SESSION['crate_data'] == ''
) {
    header('Location: ./step1.php');
    $_SESSION['flash']['danger'] = 'Please fill step 1 and step 2 before accessing to step 3.';
    die();
}

//get the container default value from dbh
$getContainerData = $containerObj->getContainerData();

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

        //get the quantity of containers in quotation
        foreach ($_SESSION['crate_data'] as $value) {

            
                $containerInQuote[] = 'V' . $value[7][1];
           
           
            //get container_df_id of containers in quotation
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
        $_SESSION['flash']['success'] = 'Project saved successfully !';
        header('Location: ./dashboard.php');
    } else {
        $_SESSION['flash']['danger'] = "There is no crate to manage, we can't go ahead anymore";
    }
}
