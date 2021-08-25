<?php
require_once '../controllers/signup-controller.php'
?>


<body>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create your account</h5>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-floating mb-3">
            <input name="username" type="email" class="form-control" id="floatingInput" placeholder="Username" value="">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="New Password" value="">
            <label for="floatingPassword">New Password</label>
          </div>
          <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="floatingPassword2" placeholder="Confirm Password" value="">
            <label for="floatingPassword2">Confirm Password</label>
          </div>
          <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="rememberMe" />
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div> -->
          <div class="modal-footer d-block">
            <button type="submit" name="saveNewAccount" class="btn btn-dark float-end">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

</html>