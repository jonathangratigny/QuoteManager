<?php
include '../Controllers/reset-password-controller.php';
include '../Controllers/header-controller.php';
?>
<h1 class="h3 text-center">Reset My Password</h1>
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
            <button type="submit" name="submit_update_password" class="btn btn-primary mt-3">Reset My Password</button>
        </form>
    </div>
<?php endif; ?>
<?php
include '../Controllers/footer-controller.php';
?>