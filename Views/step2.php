<?php
require '../Controllers/step2-controller.php';
require '../Controllers/header-controller.php';
?>
<link rel="stylesheet" href="../assets/css/step2.css">
<body class="bg-light">
    
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-text">
            STEP 2 ON 3
        </span>
        <label for="customRange2" class="form-label">Example range</label>
        <a href="./dashboard.php"><button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button></a>
    </div>
</nav>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:67%">67%</div>
</div>
<div class="container-fluid">
    <div class="row ">
        <div class="input-group mb-3 justify-content-center ">
            <div class="btn-group my-4 flex-wrap" role="group" aria-label="">
                <button type="button" class="btn" data-btn="1" id="20GPbtn"><img src="../assets/img/20GP.png" alt="20GP container"> 20GP</button>
                <button type="button" class="btn" data-btn="2" id="20FRbtn"><img src="../assets/img/20FR.png" alt="20FR container">20FR</button>
                <button type="button" class="btn" data-btn="0" id="40HCbtn"><img src="../assets/img/40HC.png" alt="40HC container">40HC</button>
                <button type="button" class="btn" data-btn="3" id="40FRbtn"><img src="../assets/img/40FR.png" alt="40FR container">40FR</button>
            </div>
        </div>
    </div>
</div>
<form action="" method="POST">
    <div class="container">
        <div class="table-responsive-sm" id="tableContainer">
        </div>
    </div>
    <div id="buttonsCase" class="container-fluid text-center">
    </div>
</form>
<script>
    //get the value of container from controller
    let defaultContainerValue = <?= $arrayContainerData ?>;
</script>
<script src="../assets/js/step2.js"></script>
<?php
include '../Controllers/footer-controller.php'; ?>