<?php
require_once '../controllers/signup-controller.php';
include '../Controllers/header-controller.php';
?>


<body>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create your account</h5>
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
            <input name="username" type="text" class="form-control " id="floatingInput" placeholder="Username" value="<?=$_POST['username'] ?? null ?>">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control " id="floatingInput" placeholder="name@example.com" value="<?=$_POST['email'] ?? null ?>">
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
          <div class="modal-footer d-block">
            <button type="submit" name="saveNewAccount" class="btn btn-dark float-end">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<?php
include '../Controllers/footer-controller.php';
?>