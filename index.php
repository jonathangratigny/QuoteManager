<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require './Models/functions.php';
require './Controllers/index-controller.php';
include './Controllers/header-controller.php';
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="" method="post" class="row g-3">
                        <h4 class="text-center">Quote Manager</h4>
                        <div class="col-12 form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Ex : test@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="col-12 form-floating">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="floatingInput">
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="col-12 form-floating">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="login" class="btn btn-dark float-end">Login</button>
                            </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet?
                            <a href="./Views/signup.php">Signup</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>