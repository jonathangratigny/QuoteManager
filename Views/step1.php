<?php
require_once '../Controllers/step1-controller.php';
require_once '../Controllers/header-controller.php';
?>
<?php if (empty($_SESSION['u_id'])) {
    $limitedAccess = 'Please log in before accessing this page.';
?>

    <body class="d-flex h-100 text-center text-white bg-dark">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-5">Quote Manager</h3>
                </div>
            </header>

            <main class="px-3 mt-5">
                <h1>Easy tiger!</h1>
                <p class="h3 mb-5">You are trying to access in restricted area.</p>
                <p class="lead"><?= $limitedAccess; ?></p>
                <p class="lead">
                    <a href="../index.php" class="btn btn-lg btn-warning fw-bold bg-warning">Log In or create your account</a>
                </p>
            </main>
        </div>
    </body>

    </html>

<?php } else { ?>
<body class="bg-light">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-text">
        STEP 1 ON 3 - Fill Project references, all of them are necessary.
      </span>
      <label for="customRange2" class="form-label">Example range</label>
      <a href="./dashboard.php"><button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button></a>
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
      <div class="container-sm mt-3 text-center">
        <h1>Your project start here.</h1>
        <p class="h5">Project and destination details are required.</p>
      </div>
      <div class="container-fluid d-flex flex-column col-lg-6 col-sm-12 mt-3">
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" placeholder="My reference" id="project_owner_ref" name="project_owner_ref" maxlength="15" value="<?= $_SESSION['project_owner_ref'] ?? null ?>">
          <label for="project_owner_ref">My Reference</label>
        </div>

        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="project_ref" placeholder="Project reference" name="project_ref" maxlength="10" value="<?= $_SESSION['project_ref'] ?? null ?>">
          <label for="project_ref">Project Reference</label>
        </div>

        <div class="form-floating mb-3 mt-3">
          <input type="text" name="project_final_customer_name" class="form-control" id="project_final_customer_name" placeholder="Project reference" value="<?= $_SESSION['project_final_customer_name'] ?? null ?>">
          <label for="project_final_customer_name">Final Customer Name</label>
        </div>

        <label for="project_shipping_line">Shipping Line :</label>
        <div class="d-flex mt-1 mb-3">
          <select class="form-select" name="project_shipping_line" id="project_shipping_line">
            <option selected><?= $_SESSION['project_shipping_line'] ?? 'Select A Shipping Line' ?></option>
            <?php foreach ($getShippingLine as $name) : ?>
              <option><?= $name['sl_name'] ?? 'Select A Shipping Line' ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <label for="project_POL">Port Of Loading :</label>
        <div class="d-flex mb-3 mt-1">
          <select class="form-select" name="project_POL" id="project_POL">
            <option>Le Havre</option>
          </select>
        </div>


        <label for="project_country_dest">Destination Country :</label>
        <div class="d-flex mt-1 mb-3">
          <select class="form-select" name="project_country_dest" id="project_country_dest">
            <option selected><?= $_SESSION['project_country_dest'] ?? 'Select A Country' ?></option>
            <?php foreach ($showUniqueCountry as $key => $port) : ?>
              <option><?= $port['port_country'] ?? 'Select A Country' ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <label for="project_POD">Port Of Discharge : </label>
        <div class="d-flex mb-3 ">
          <select name="project_POD" id="project_POD" class="form-select">
            <option><?= $_SESSION['project_POD'] ?? 'Select A Port' ?></option>
          </select>
        </div>
        <div class="container text-center">
          <button type="submit" name='step1' class="btn btn-warning">Next</button>
        </div>
      </div>
    </form>
  </div>

  <script src="../assets/js/script.js"></script>
  <?php } ?>
  <?php include '../Controllers/footer-controller.php'; ?>