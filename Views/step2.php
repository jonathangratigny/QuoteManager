<?php
require '../Controllers/step2-controller.php';
require '../Controllers/header-controller.php';
// var_dump($_POST);
// var_dump($_SESSION);
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
                <button type="button" class="btn btn-primary" data-btn="0" id="40HCbtn">40HC</button>
                <button type="button" class="btn btn-primary" data-btn="1" id="20GPbtn">20GP</button>
                <button type="button" class="btn btn-primary" data-btn="2" id="20FRbtn">20FR</button>
                <button type="button" class="btn btn-primary" data-btn="3" id="40FRbtn">40FR</button>
            </div>
        </div>
    </div>
</div>

<form action="" method="POST" id="form">
    <div class="table-responsive">
        <!-- HERE inputs -->
        <table class="table table-bordered table-sm" id="tableContainer">
            <thead>
                <tr>
                    <th scope="col">Crate Ref</th>
                    <th scope="col">Length in cm</th>
                    <th scope="col">Width in cm</th>
                    <th scope="col">Height in cm</th>
                    <th scope="col">Weight in kg</th>
                    <th scope="col">Volume in m3</th>
                </tr>
            </thead>
            <tbody id="cloneHere">
                <tr>
                    <td id="test">
                        <button type="button" onclick="addRowToTable()">Add a line</button>
                        <button type="button" onclick="removeRowFromTable">Remove a line</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Click me</button>
                    </td>
                </tr>
        </table>
    </div>
    <div id="buttonsCase" class="container-fluid text-center"></div>

</form>


<script>
    //get the value of container from controller
    let defaultContainerValue = <?= $arrayContainerData ?>;
</script>
<script src="../assets/js/step2.js"></script>
<?php
include '../Controllers/footer-controller.php';
?>