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
            <label class="input-group-text" for="inputGroupSelectCT">Containers</label>
            <select class="form-select" id="inputGroupSelectCT">
                <option selected>Select a container</option>
                <option value="40FR" name="40FR">40FR</option>
                <option value="20FR" name="20FR">20FR</option>
                <option value="40HC" name="40HC">40HC</option>
                <option value="20GP" name="20GP">20GP</option>
            </select>
            <button type="button" name="valid" class="btn btn-warning">add</button>
        </div>
    </div>
</div>
<form action="" method="post" class="table-responsive">
    <table class="table">
        <thead>Container</thead>
        <tr>
            <th scope="col">Crate Name</th>
            <th scope="col">Length</th>
            <th scope="col">Width</th>
            <th scope="col">Height</th>
            <th scope="col">Weight</th>
            <th scope="col">Volume</th>
        </tr>
        <tr>
            <td><input class="w-auto" type="text" name="crate_ref" id=""></td>
            <td><input class="w-auto" type="text" name="crate_length" id=""></td>
            <td><input class="w-auto" type="text" name="crate_width" id=""></td>
            <td><input class="w-auto" type="text" name="crate_height" id=""></td>
            <td><input class="w-auto" type="text" name="crate_gross_weight" id=""></td>
            <td><input class="w-auto" type="text" name="crate_volume" id=""></td>
        </tr>
        


    </table>


</form>
<div class="container-fluid text-center">
    <!-- <button type="button" class="btn btn-success">Save as draft</button> -->
    <button type="button" class="btn btn-secondary">Back</button>
    <button type="button" class="btn btn-primary">Next</button>
</div>
<div>
    <label for=""></label>
</div>



<?php
include '../Controllers/footer-controller.php'
?>