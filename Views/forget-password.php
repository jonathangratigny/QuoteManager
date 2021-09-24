<?php

require '../Controllers/forget-password-controller.php';
include '../Controllers/header-controller.php';
?>

<body class="bg-light">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-text text-center "><a class="text-decoration-none" href="../Views/login.php"> Quote Manager</a></span>
    </div>
  </nav>
  <div class="container-fluid w-50 mx-auto">
    <form action="" method="POST">
      <div class="container-sm mt-3 text-center">
        <h1>Now you can reset your password</h1>
        <p class="h5">Please fill your email and follow instructions from this email.</p>
      </div>
      <div class="form-group mt-4">
        <input class="form-control mt-2" type="email" name="reset_email" placeholder="your@email.com" id="email_address">
      </div>
      <button type="submit" name="submit_reset_password" class="btn btn-warning mt-3">Send Password Reset Email</button>
    </form>
  </div>
</body>