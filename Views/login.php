<?php
include '../Controllers/login-controller.php';
include '../Controllers/header-controller.php';
?>
<link rel="stylesheet" href="../assets/css/login.css">

<body class="text-center flex-column">
    <main class="form-signin">
        <form action="" method="post">
            <h1 class="h2 mb-2 ">Welcome to Quote Manager!</h1>
            <h1 class="h4 mb-5 fw-normal">We were waiting for you.</h1>
            <div class="form-floating mb-3">
                <input type="text" name="log-username" class="form-control" id="floatingInput" placeholder="Email or Username">
                <label for="floatingInput">Email or Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="log-password" class="form-control" placeholder="Password" id="floatingPassword">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <a class=" text-decoration-none fw-light contour" href="forget-password.php">Forgot Password?</a>
            </div>
            <div class="my-4">
                <span style="position: relative;">By logging on Quote Manager, you accept our <a class="fw-light stretched-link  text-decoration-none contour" href="./cgu.php">Terms</a></span>
                <button type="submit" name="login" class="btn btn-warning mt-3 w-100">Login</button>
            </div>
        </form>
        <hr class="mt-4">
        <div class="col-12">
            <p class="text-center mb-0" style="position: relative;">Need an account?
                <a class="text-decoration-none fw-light contour stretched-link" href="signup.php">Sign up now!</a>
            </p>
        </div>
    </main>
</body>

<?php
include '../Controllers/footer-controller.php';
?>