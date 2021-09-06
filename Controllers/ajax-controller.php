<?php

require '../Models/database.php';
require '../Models/ajax.php';

$ajaxObj = new Ajax();
$POD = $_GET['country'];

$arrayPOD = $ajaxObj->getPOD($POD);

echo json_encode($arrayPOD);