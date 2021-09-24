<?php
include '../Controllers/reset-password-controller.php';
include '../Controllers/header-controller.php';
?>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-text text-center "><a class="text-decoration-none" href="../Views/login.php"> Quote Manager</a></span>
        </div>
    </nav>
    <h1 class="h3 text-center mt-5">Reset My Password</h1>
    <?php
    if (!isset($error)) : ?>
        <div class="container-fluid w-50 mx-auto">
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="New Password">New Password</label>
                    <input class="form-control mt-2" type="password" name="update_password" placeholder="update password" id="New Password">
                </div>
                <div class="form-group mt-3">
                    <label for="Repeat Password">Repeat</label>
                    <input class="form-control mt-2" type="password" name="update_password_confirm" placeholder="repeat password" id="Repeat Password">
                </div>
                <div class="row ">
                    <div class="col-auto mx-auto">
                        <button type="submit" name="submit_update_password" class="btn btn-warning mt-3">Reset My Password</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto mx-auto">
                        <a href="login.php">
                            <button type="button" class="btn btn-warning mt-3">Return To Login</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>
</body>
<?php
include '../Controllers/footer-controller.php';
?>