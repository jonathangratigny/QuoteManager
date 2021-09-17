<?php
require '../Controllers/header-controller.php';
require '../Controllers/step3-controller.php';
var_dump($_SESSION);
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-text">
            STEP 3 ON 3
        </span>
        <label for="customRange2" class="form-label">Example range</label>
        <button type="button" class="btn btn-warning text-dark btn-sm" onclick="window.location">Dashboard</button>
    </div>
</nav>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:99%">99%</div>
</div>
<div>Recap of your quote :</div>

<form action="" method="post">
    <div class="container-fluid d-flex flex-column col-lg-6 col-sm-12">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="My reference" value="<?= $_SESSION['project_owner_ref'] ?? null ?>" disabled>
            <label for="project_owner_ref">My Reference</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" value="<?= $_SESSION['project_ref'] ?? null ?>" disabled>
            <label for="project_ref">Project Reference</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Final Customer Name" value="<?= $_SESSION['project_final_customer_name'] ?? null ?>" disabled>
            <label for="project_final_customer_name">Final Customer Name</label>
        </div>

        <div class="form-floating mt-1 mb-3">
            <input type="text" class="form-control" placeholder="Shipping Line" value="<?= $_SESSION['project_shipping_line'] ?? null ?>" disabled>
            <label for="project_shipping_line">Shipping Line</label>
        </div>

        <div class="form-floating mt-1 mb-3">
            <input type="text" class="form-control" placeholder="Port Of Loading" value="<?= $_SESSION['project_POL'] ?? null ?>" disabled>
            <label for="project_POL">Port Of Loading</label>
        </div>
        <div class="form-floating mt-1 mb-3">
            <input type="text" class="form-control" placeholder="Port Of Loading" value="<?= $_SESSION['project_POD'] . ', ' . $_SESSION['project_country_dest'] ?? null ?>" disabled>
            <label for="project_POD">Port Of Discharge</label>
        </div>
        <div class="">
            <span class="">crate_data</span>
            <?php foreach ($_SESSION['crate_data'] as $value) : ?>
                <input type="text" class="form-control" value="Container id : <?= $value[5] . " Crate ref : " . $value[1]  . ' x ' . $value[2] . ' x ' . $value[3] . ' cm ' . $value[4] . 'kg' ?>">
            <?php endforeach; ?>
        </div>
        <div class="container text-center">
            <button type="submit" name='step1' class="btn btn-primary">Next</button>
        </div>
    </div>
</form>
</div>
<?php
include '../Controllers/footer-controller.php'; ?>