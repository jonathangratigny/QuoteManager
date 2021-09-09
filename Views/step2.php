<?php
require '../Controllers/step2-controller.php';
require '../Controllers/header-controller.php';
?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-text">
            STEP 2 ON 3
        </span>
        <label for="customRange2" class="form-label">Example range</label>
        <button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button>
    </div>
</nav>

<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:67%">67%</div>
</div>

<div class="container-fluid">
    <div class="container-fluid text-center">
        <div class="input-group mb-3">
            <div class="btn-group" role="group" aria-label="">
                <button type="button" class="btn btn-primary" id="20FRbtn">20FR</button>
                <button type="button" class="btn btn-primary" id="40FRbtn">40FR</button>
                <button type="button" class="btn btn-primary" id="20GPbtn">20GP</button>
                <button type="button" class="btn btn-primary" id="40HCbtn">40HC</button>

            </div>
        </div>
    </div>
</div>
<form action="" method="post" class="table-responsive" id="tableContainer">

    <button type="submit" class="btn btn-primary">Next</button>

</form>
<div class="container-fluid text-center">
    <!-- <button type="button" class="btn btn-success">Save as draft</button> -->
    <button type="button" class="btn btn-secondary">Back</button>
</div>
<div>
    <label for=""></label>
</div>
<script >
    //get the value of container from controller
    let defaultContainerValue = <?= $arrayContainerData ?>;
    console.log(defaultContainerValue);
</script>
<script src="../assets/js/step2.js"></script>
<?php
include '../Controllers/footer-controller.php';
?>