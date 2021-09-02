<?php
include '../Controllers/login-controller.php';
include '../Controllers/header-controller.php';
?>

<body>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <form action="" method="post" class="row g-3">
                    <h4 class="text-center">Quote Manager</h4>
                    <div class="col-12 form-floating">
                        <input type="text" name="log-username" class="form-control" id="floatingInput" placeholder="Email or Username">
                        <label for="floatingInput">Email or Username</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="password" name="log-password" class="form-control" placeholder="Password" id="floatingInput">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="col-12 form-floating">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe"> Remember me</label>
                            <a href="forget-password.php">Reset my password...</a>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-dark float-end">Login</button>
                        </div>
                </form>
                <hr class="mt-4">
                <div class="col-12">
                    <p class="text-center mb-0">Have not account yet?
                        <a href="signup.php">Signup</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
include '../Controllers/footer-controller.php';
?>