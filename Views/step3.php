<?php
require '../Controllers/header-controller.php';
require '../Controllers/step3-controller.php';
// var_dump($_SESSION);?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-text">
            STEP 3 ON 3
        </span>
        <label for="customRange2" class="form-label">Example range</label>
        <button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button>
    </div>
</nav>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:99%">99%</div>
</div>
<div>Recap of your quote :</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Project ref :</span>
    <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?= $_SESSION['project_owner_ref'] ?>" >
</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">project_final_customer_name ref :</span>
    <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?= $_SESSION['project_final_customer_name'] ?>" >
</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">project_shipping_line ref :</span>
    <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?= $_SESSION['project_shipping_line'] ?>" >
</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">project_country_dest ref :</span>
    <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?= $_SESSION['project_country_dest'] ?>" >
</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">project_POL :</span>
    <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?= $_SESSION['project_POL'] ?>" >
</div>
<div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">project_POD :</span>
    <input type="text" class="form-control" aria-describedby="addon-wrapping" value="<?= $_SESSION['project_POD'] ?>" >
</div>
<div class="input-group ">
    <span class="input-group-text">crate_data :</span>
    <?php foreach ($_SESSION['crate_data'] as $value) : ?>
        <input type="text" class="form-control" value="Container id : <?= $value[5] . " Crate ref : " . $value[1]  . ' x ' . $value[2] . ' x ' . $value[3] . ' cm ' . $value[4] . 'kg' ?>" >
    <?php endforeach;?>
</div>
<?php
include '../Controllers/footer-controller.php';?>