<?php
require_once '../controllers/signup-controller.php';
include '../Controllers/header-controller.php';
?>
<link rel="stylesheet" href="../assets/css/login.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Ld7L6ocAAAAAB-MPmEp57HYI5MGJ4OgSkXEClj8'
        });
      };
    </script>
<body class="bg-light text-center flex-column">
  <div class="container-sm mt-3 text-center mb-5">
    <h1>Welcome to Quote Manager!</h1>
    <p class="h5">You can create your account now.</p>
  </div>
  <div class="modal-dialog w-75">
    <div class="modal-content border-0 bg-light">
      <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
          <p>Form contain errors, please correct them before submit :</p>
          <?php foreach ($errors as $error) : ?>
            <ul>
              <li><?= $error; ?></li>
            </ul>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-floating mb-3">
            <input name="username" type="text" class="form-control " id="floatingInput" placeholder="Username" value="<?= $_POST['username'] ?? null ?>">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control " id="floatingInput2" placeholder="name@example.com" value="<?= $_POST['email'] ?? null ?>">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="New Password" value="">
            <label for="floatingPassword">Choose Password</label>
          </div>
          <div class="form-floating mb-3">
            <input name="confirm_password" type="password" class="form-control " id="floatingPassword2" placeholder="Confirm Password" value="">
            <label for="floatingPassword2">Confirm Password</label>
            <div class="g-recaptcha mt-3 d-flex justify-content-center" data-sitekey="6Ld7L6ocAAAAAB-MPmEp57HYI5MGJ4OgSkXEClj8"></div>
          </div>
          <div class="modal-footer d-flex row justify-content-between">
            <div class="col-auto mx-auto">
              <a href="./login.php" class="btn btn-warning">Log In</a>
            </div>
            <div class="col-auto mx-auto">
              <button type="submit" name="saveNewAccount" class="btn btn-warning float-end">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  include '../Controllers/footer-controller.php';
  ?>