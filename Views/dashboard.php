<?php
require_once '../Controllers/dashboard-controller.php';
require_once '../Controllers/header-controller.php';
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
            <div class="container-fluid flex-column">
                <div class="row">
                    <span class="navbar-text h5"> Welcome to Dashboard, <?= $_SESSION['u_username'] ?? null ?></span>
                </div>
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <a href="step1.php"><span type="button" class="btn btn-warning text-dark btn-sm">New Quote</span></a>
                    </div>
                    <div class="col-auto">
                        <a href="../Views/disconnect.php"><button type="button" class="btn btn-warning text-dark btn-sm">Disconnect</button></a>
                    </div>
                </div>
            </div>
        </nav>
        <h1 class="display-6 mt-3">Quotation History</h1>
        <?php foreach ($showProjectData as $value) : ?>

            <?php //to calculate the days from creating date of a project
            $dateDifferenceProjectAndNow = $projectObj->dateDifferenceProjectAndNow($value['project_id']); ?>
            <?php // to show shipping line per project
            $getShippingLineWithID = $shippingLineObj->getShippingLineWithID($value['sl_id']); ?>
            <div class="container my-3">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto mb-3">
                            <div class="fw-bold">Project Ref : <?= $value['project_ref'] ?? null ?>, Created By <?= $projectOwnerWithID['u_username'] ?? null ?> , <?= $dateDifferenceProjectAndNow['creating_interval'] ?? null ?> days ago</div>
                            <span class="badge bg-warning rounded-pill d-flex flex-wrap mb-4"></span>
                            <div>Final Customer : <?= $value['project_final_customer_name'] ?? null ?></div>
                            <div>Carrier : <?= $getShippingLineWithID->sl_name ?? null ?></div>
                            <div>Port Of Loading : <?= $value['project_POL'] ?? null ?>, France</div>
                            <div>Port Of Discharge : <?= $value['project_POD'] ?? null ?>, <?= $value['project_country_dest'] ?? null ?></div>
                            <div>Creating Date : <?= $value['project_created_at'] ?? null ?></div>
                            <div class=" col mx-auto mt-3">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#quote<?= $indexModal ?>">Delete Project</button>
                                <button type="button" data-project="<?= $value['project_ref'] ?? null ?>" class="btn btn-secondary btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#quote<?= $indexModal ?>">View more</button>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Modal -->
                <div class="modal fade" id="quote<?= $indexModal ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <div class="container">
                                    <div class="row">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <h5 class="modal-title text-center h2" id="exampleModalLabel">PROJECT <?= $value['project_ref'] ?? null . ' ' . $value['project_POL'] ?? null . ' - ' . $value['project_POD'] ?? null ?>
                                        </h5>
                                        <span class="modal-body text-center" id="exampleModalLabel">Carrier : <?= $getShippingLineWithID->sl_name ?? null ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php $getContainerById = $containerObj->getContainerById($value['project_ref']);
                            $i = 1; ?>
                            <?php foreach ($getContainerById as $dataContainer) : ?>
                                <?php $maxWidthContainer = $containerObj->maxWidthContainer($dataContainer['project_container_id']) ?>
                                <?php $maxHeightContainer = $containerObj->maxHeightContainer($dataContainer['project_container_id']) ?>
                                <?php $totalGrossWeight = $containerObj->totalGrossWeight($dataContainer['project_container_id']) ?>
                                <?php $getContainerDimensions = $containerObj->getContainerDimensions($dataContainer['container_df_type']) ?>
                                <div class="modal-body bg-light">
                                    <ul class="list-group ">
                                        <li class="list-group-item">
                                            <p class="text-center fw-bold"><?= $dataContainer['container_df_type'] ?> - Container #<?= $i ?></p>
                                            <p> Widht : <?= $dataContainer['container_df_type'] == '40FR' ? $maxWidthContainer['max_width'] . 'cm ⇨ ' . (($maxWidthContainer['max_width'] - $getContainerDimensions['container_df_width']) / 2) . 'cm Over Width Each Sides.' : ($dataContainer['container_df_type'] == '20FR' ? $maxWidthContainer['max_width'] . 'cm ⇨ ' . (($maxWidthContainer['max_width'] - $getContainerDimensions['container_df_width']) / 2) . 'cm Over Width Each Sides.'  : ($dataContainer['container_df_type'] == '40HC' ? $getContainerDimensions['container_df_width'] . 'cm' : ($dataContainer['container_df_type'] == '20GP' ? $getContainerDimensions['container_df_width'] . 'cm' : 'Error'))) ?> </p>

                                            <div> Height : <?= $dataContainer['container_df_type'] == '40FR' ? $maxHeightContainer['max_height'] . 'cm ⇨ ' . ($maxHeightContainer['max_height'] - $getContainerDimensions['container_df_height']) . 'cm Over Height.' : ($dataContainer['container_df_type'] == '20FR' ? $maxHeightContainer['max_height'] . 'cm ⇨ ' . ($maxHeightContainer['max_height'] - $getContainerDimensions['container_df_height']) . 'cm Over Height.' : ($dataContainer['container_df_type'] == '40HC' ? $getContainerDimensions['container_df_height'] . 'cm' : ($dataContainer['container_df_type'] == '20GP' ? $getContainerDimensions['container_df_height'] . 'cm' : 'Error'))) ?> </div>
                                            <div> Gross weight : <?= $totalGrossWeight['total_gross_weight'] ?>kg</div>
                                        </li>
                                    </ul>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <div class="modal-footer d-flex bd-highlight bg-light">
                                <form action="" method="post" class="me-auto bg-light">
                                    <button type="submit" name="delete_project" value="<?= $value['project_id'] ?>" class="btn btn-danger p-2 bd-highlight">Delete Project</button>
                                </form>
                                <button type="button" class="btn btn-secondary p-2 bd-highlight" data-bs-dismiss="modal">Close</button>
                                <form action="./project-view.php" method="post">
                                    <input type="hidden" value="<?= $value['project_id'] ?>" name="view_project">
                                    <button type="submit" class="btn btn-primary p-2 bd-highlight">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $indexModal++ ?>
        <?php endforeach; ?>

        <h2 class="display-6">Carrier directory</h2>
        <div class="container-fluid">
            <ul class="list-group"></ul>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 border-top px-2">
                <?php foreach ($getShippingLine as $value) : ?>
                    <li class="list-group-item border-top-0"><?= $value['sl_name'] ?>
                        <div><?= $value['sl_email'] ?></div>
                        <div><?= $value['sl_phone'] ?></div>
                    </li>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        include '../Controllers/footer-controller.php';
        ?>
    <?php } ?>