<?php
require '../Controllers/step1-controller.php';
require '../Controllers/header-controller.php';
?>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-text">
        STEP 1 ON 3
      </span>
      <label for="customRange2" class="form-label">Example range</label>
      <button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button>
    </div>
  </nav>

  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:33%">33%</div>
  </div>

  <div class="container">
    <?php if (!empty($errorS1)) : ?>
      <div class="alert alert-danger">
        <p>Form contain errors, please correct them before submit :</p>
        <?php foreach ($errorS1 as $error) : ?>
          <ul>
            <li><?= $error; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form action="" method="post">
      <div class="container-fluid d-flex flex-column col-lg-6 col-sm-12">
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" placeholder="My reference" id="project_owner_ref" name="project_owner_ref" maxlength="15">
          <label for="project_owner_ref">My Reference</label>
        </div>

        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="project_ref" placeholder="Project reference" name="project_ref" maxlength="10">
          <label for="project_ref">Project Reference</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" name="project_final_customer_name" class="form-control" id="project_final_customer_name" placeholder="Project reference">
          <label for="project_final_customer_name">Final Customer Name</label>
        </div>

        <label for="project_POL">Port Of Loading :</label>
        <div class="d-flex mb-3 mt-1">
          <select style="min-width: 200px; text-align: center;" name="project_POL" id="project_POL">
            <option>LE HAVRE</option>
          </select>
        </div>

        <label for="project_country_dest">Destination Country :</label>
        <div class="d-flex mt-1 mb-3">
          <select style="min-width: 200px; text-align: center;" name="project_country_dest" id="project_country_dest">
            <option selected value="none">Select A Country</option>
            <?php foreach ($showUniqueCountry as $key => $port) : ?>
              <option><?= $port['port_country'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="d-flex mb-3 ">
          <label for="project_POD">Port Of Discharge : </label>
          <select name="project_POD" id="project_POD">
          </select>
        </div>
        <div class="container text-center">
          <!-- <button type="button" class="btn btn-warning">Save as draft</button> -->
          <!-- <a href="./step2.php"> -->
          <button type="submit" name='step1' class="btn btn-primary">Next</button>
          <!-- </a> -->
        </div>
      </div>
    </form>
  </div>

  <script src="../assets/js/script.js"></script>
  <?php include '../Controllers/footer-controller.php'; ?>