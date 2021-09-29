<?php
require '../Controllers/project-view-controller.php';
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
                <span class="navbar-text"> Project number : <?= $containersDetails[0]['project_ref'] ?? null ?></span>
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
        </nav>
        <div class="container-sm mt-3 text-center">
            <h1>Now you can update crates data!</h1>
            <p class="h5">Click on updates double rows and let it go...</p>
        </div>
        <div class="container-sm mt-5">
            <div class="card mt-3">
                <div class="card-body table-responsive">
                    <h5 class="card-title">Container <?= $containersDetails[0]['CT_type'] ?? null ?></h5>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Crate Ref</th>
                                <th scope="col">Length in cm</th>
                                <th scope="col">Width in cm</th>
                                <th scope="col">Height in cm</th>
                                <th scope="col">Weight in kg</th>
                                <th scope="col">Volume in m3</th>
                                <th scope="col">update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($containersDetails as $key => $value) : ?>
                                <?php if ($value['CT_id'] != $cratePerContainer) : ?>
                                    <?php $cratePerContainer = $value['CT_id'] ?? null; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-body table-responsive">
                    <h5 class="card-title">Container <?= $value['CT_type'] ?? null ?></h5>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Crate Ref</th>
                                <th scope="col">Length in cm</th>
                                <th scope="col">Width in cm</th>
                                <th scope="col">Height in cm</th>
                                <th scope="col">Weight in kg</th>
                                <th scope="col">Volume in m3</th>
                                <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php endif; ?>
                        <tr class="text-center">
                            <td class="bg-light"><input class="border-0 form-control text-center bg-light" type="text" name="crate_ref" value="<?= $value['crate_ref'] ?? null ?>" readonly></td>
                            <td class="bg-light"><input class="border-0 form-control text-center bg-light" type="number" name="crate_length" value="<?= $value['crate_length'] ?? null ?>" readonly></td>
                            <td class="bg-light"><input class="border-0 form-control text-center bg-light" type="number" name="crate_width" value="<?= $value['crate_width'] ?? null ?>" readonly></td>
                            <td class="bg-light"><input class="border-0 form-control text-center bg-light" type="number" name="crate_height" value="<?= $value['crate_height'] ?? null ?>" readonly></td>
                            <td class="bg-light"><input class="border-0 form-control text-center bg-light" type="number" name="crate_gross_weight" value="<?= $value['crate_weight'] ?? null ?>" readonly></td>
                            <td readonly class="text-center align-middle bg-light"><?= $value['crate_volume'] ?? null ?></td>
                            <form action="./update-crate.php" method="post">
                                <td class="align-middle">
                                    <input type="hidden" name="project_ref" value="<?= $containersDetails[0]['project_ref'] ?? null ?>">
                                    <button type="submit" name="update_crate" value="<?= $value['crate_id'] ?? null ?>" class="btn btn-transparent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                        </svg>
                                    </button>
                                </td>
                                <input type="hidden" name="project_ref" value="<?= $containersDetails[0]['project_ref'] ?? null ?>">
                            </form>
                        </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    include '../Controllers/footer-controller.php';
    ?>