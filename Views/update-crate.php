<?php
require '../Controllers/update-crate-controller.php';
require '../Controllers/header-controller.php';
?>
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

    <body class="bg-light">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-text"> Project number : <?= $_POST['project_ref'] ?? null ?></span>
                <div class="d-flex">
                    <div class="row">
                        <div class="col-auto">
                            <a href="./dashboard.php"><button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button></a>
                        </div>
                        <div class="col-auto">
                            <a href="step1.php"><span type="button" class="btn btn-warning text-dark btn-sm">New Quote</span></a>
                        </div>
                        <div class="col-auto">
                            <a href="../Views/disconnect.php"><button type="button" class="btn btn-warning text-dark btn-sm">Disconnect</button></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </nav>
        <div class="container-sm mt-3 text-center">
            <h1>Fill the fields to update.</h1>
            <p class="h5">Then click on save button and let the magic operate...</p>
        </div>
        <div class="table-responsive-sm mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center align-middle">
                        <th scope="col">Crate Ref</th>
                        <th scope="col">Length in cm</th>
                        <th scope="col">Width in cm</th>
                        <th scope="col">Height in cm</th>
                        <th scope="col">Weight in kg</th>
                        <th scope="col">save</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post">
                        <tr class="text-center">
                            <td><input class="border-0 form-control text-center" type="text" name="project_crate_ref" value="<?= $readCrate[0]['project_crate_ref'] ?? null ?>" maxlength="10"></td>

                            <td><input class="border-0 form-control text-center" type="number" name="project_crate_length" data-crate="length" value="<?= $readCrate[0]['project_crate_length'] ?? null ?>" onkeypress="if (this.value.length > 3) return false"></td>

                            <td><input class="border-0 form-control text-center" type="number" name="project_crate_width" data-crate="width" value="<?= $readCrate[0]['project_crate_width'] ?? null ?>" onkeypress="if (this.value.length > 2) return false"></td>

                            <td><input class="border-0 form-control text-center" type="number" name="project_crate_height" data-crate="height" value="<?= $readCrate[0]['project_crate_height'] ?? null ?>" onkeypress="if (this.value.length > 2) return false"></td>

                            <td><input class="border-0 form-control text-center" type="number" name="project_crate_gross_weight" data-crate="weight" value="<?= $readCrate[0]['project_crate_gross_weight'] ?? null ?>" onkeypress="if (this.value.length > 4) return false"></td>

                            <td class="text-center align-middle"><button type="submit" class="btn btn-secondary" name="save_update" value="<?= $crateID ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <script src="../assets/js/update-crate.js"></script>
    <?php } ?>
    <?php
    include '../Controllers/footer-controller.php';
    ?>