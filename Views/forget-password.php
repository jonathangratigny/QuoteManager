<?php

require '../Controllers/forget-password-controller.php';
include '../Controllers/header-controller.php';
var_dump($_SESSION);
?>
<div class="container-fluid w-50 mx-auto">
  <form action="" method="POST">
    <h1 class="h3">Reset your password</h1>
    <div class="form-group mt-4">
      <label for="email_address">Email address</label>
      <input class="form-control mt-2" type="email" name="reset_email" placeholder="your@email.com" id="email_address">
    </div>
    <button type="submit" name="submit_reset_password" class="btn btn-primary mt-3">Send Password Reset Email</button>
  </form>
</div>
