<?php
require_once '../controllers/signup-controller.php';
include '../Controllers/header-controller.php';
?>
<link rel="stylesheet" href="../assets/css/login.css">

<body class="bg-light text-center flex-column">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Create your account now !</h5>
      </div>
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