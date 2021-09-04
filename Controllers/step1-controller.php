<?php

require '../Models/database.php';
require '../Models/user.php';
require '../Models/port.php';
require '../Models/project.php';

$portObj = new Port();
$showCountryFromPOD = $portObj->showPOD();
var_dump($showCountryFromPOD[0]['port_name']);