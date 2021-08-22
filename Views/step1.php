<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>QuoteManager - step1</title>
</head>

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
      <div class="container-fluid d-flex flex-column">

        <div class="form-floating mb-3 ">
          <input type="text" class="form-control" placeholder="My reference" id="myReference">
          <label for="My reference">My reference</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="projectRef" placeholder="Project reference">
          <label for="projectRef">Project reference</label>
        </div>

        <div class="d-flex">
          <label for="POL">Port of loading :</label>
          <select name="POL" id="POL">
            <option value="none">LE HAVRE</option>
          </select>
        </div>

        <div class="d-flex">
          <label for="destCountry">Destination country : </label>
          <select name="destCountry" id="destCountry">
            <option selected value="none">Select a country</option>
            <!-- ici il faut injecter le json des pays -->
            
          </select>
        </div>

        <div class="d-flex">
          <label for="POD">port of discharge : </label>
          <select name="POD" id="POD">
            <option value="none">-</option>
            <!-- ici il faut injecter le json des pays -->
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