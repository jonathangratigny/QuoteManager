<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();

    // header('Location: index.php');
}
var_dump($_SESSION);
// unset($_SESSION['crate_data']);


require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';
require '../Models/container-default-value.php';

$errorS2 = array();
$dataFilled = array();
$totalRow = 0;

// var_dump($_POST);

//get the container default value from dbh
$containerObj = new ContainerDefault;
$getContainerData = $containerObj->getContainerData();
$arrayContainerData = json_encode($getContainerData);


if (isset($_POST)) {
    //kick in error array the empty values
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'total', 0) !== false) {
            continue;
        }
        if (strlen($value) == 0) {
            $errorS2[] = $key;
        }
        if (strlen($value) > 0) {
            $dataFilled[$key] = $value;
        }
        if (strpos($key, 'crate_ref_R', 0) !== false && strlen($value) != 0) {
            $totalRow++;
        }
    }

    $dimsArray = []; // Array nous permettant de stacker nos cotes 
    $start = 1; // va nous permettre de recup les valeurs avec un pas de 5
    if (!empty($dataFilled)) {
        foreach ($dataFilled as $key => $value) {
            // nous poussons les valeurs dans un array intermédiaire $row
            $row[] = $value;
            // nous poussons notre array lors d'un multiple de 5
            if (($start % 5) == 0) {
                // on recupère les données R et V dans le dernier passage à l'aide d'un explode de la key
                $infos = explode('_', $key);
                array_push($row, $infos[5], $infos[6], $infos[7]); // on pousse ces valeurs dans notre array intermédiaire
                $dimsArray[] = $row; // on pousse notre array intermédiaire
                $row = []; // puis on vide notre array intermédiaire
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
?>