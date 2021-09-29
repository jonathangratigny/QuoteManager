<?php
require '../Controllers/step2-controller.php';
require '../Controllers/header-controller.php';
?>
<link rel="stylesheet" href="../assets/css/step2.css">
<?php if (empty($_SESSION['u_id'])) {
    $limitedAccess = 'Please log in before accessing this page.';
?>

    <body class="d-flex h-100 text-center text-white bg-dark">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-5">Quote Manager</h3>
                </div>
            </header>

            <main class="px-3 mt-5">
                <h1>Easy tiger!</h1>
                <p class="h3 mb-5">You are trying to access in restricted area.</p>
                <p class="lead"><?= $limitedAccess; ?></p>
                <p class="lead">
                    <a href="../index.php" class="btn btn-lg btn-warning fw-bold bg-warning">Log In or create your account</a>
                </p>
            </main>
        </div>
    </body>

    </html>

<?php } else { ?>
<body class="bg-light" style="height: 100vh">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-text">
                STEP 2 ON 3 - Choose the containers to be quoted and fill them with your crates...
            </span>
            <a href="./dashboard.php"><button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button></a>
        </div>
    </nav>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width:67%">67%</div>
    </div>
    <div class="container-fluid">
        <div class="container-sm mt-3 text-center">
            <h1>Now select a container, you can choose among those 2 types.</h1>
            <p class="h5">Be careful on your data, they are precious!</p>
        </div>
        <div class="row ">
            <div class="input-group mb-3 justify-content-center ">
                <div class="btn-group my-4 flex-wrap" role="group" aria-label="">
                    <!-- <button type="button" class="btn" data-btn="1" id="20GPbtn"><img src="../assets/img/20GP.png" alt="20GP container"> 20GP</button> -->
                    <button type="button" class="btn" data-btn="2" id="20FRbtn"><img src="../assets/img/20FR.png" alt="20FR container">20FR</button>
                    <!-- <button type="button" class="btn" data-btn="0" id="40HCbtn"><img src="../assets/img/40HC.png" alt="40HC container">40HC</button> -->
                    <button type="button" class="btn" data-btn="3" id="40FRbtn"><img src="../assets/img/40FR.png" alt="40FR container">40FR</button>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        <div class="container">
            <div class="table-responsive-sm" id="tableContainer">
            </div>
        </div>
        <div id="buttonsCase" class="container-fluid text-center mt-5">
        </div>
    </form>
    <script>
        //get the value of container from controller
        let defaultContainerValue = <?= $arrayContainerData ?>;
    </script>
    <script src="../assets/js/step2.js"></script>
    <?php } ?>
    <?php
    include '../Controllers/footer-controller.php'; ?>