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
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar"
      aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:33%">33%</div>
  </div>

  <div class="container">
    <form action="" method="post">
      <div class="container-fluid d-flex flex-column col-6">

        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" placeholder="My reference" id="project_owner_ref" name="project_owner_ref">
          <label for="project_owner_ref">My Reference</label>
        </div>

        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="project_ref" placeholder="Project reference" name="project_ref">
          <label for="project_ref">Project Reference</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" name="project_final_customer_name" class="form-control" id="project_final_customer_name" placeholder="Project reference">
          <label for="project_final_customer_name">Final Customer Name</label>
        </div>

        <div class="d-flex mb-3">
          <label for="project_POL">Port Of Loading :</label>
          <select name="project_POL" id="project_POL">
            <option value="none">LE HAVRE</option>
          </select>
        </div>

        <div class="d-flex mb-3">
          <label for="project_country_dest">Destination Country : </label>
          <select name="project_country_dest" id="project_country_dest">
            <option selected value="none">Select A Country</option>
            
          </select>
        </div>

        <div class="d-flex">
          <label for="project_POD">Port Of Discharge : </label>
          <select name="project_POD" id="project_POD">
            <option value="none">Select A Port</option>

          </select>
        </div>
        <div class="container text-center">
          <!-- <button type="button" class="btn btn-warning">Save as draft</button> -->
          <a href="./step2.php"><button type="button" class="btn btn-primary">Next</button></a>
        </div>

    </form>
  </div>
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
</body>

</html>