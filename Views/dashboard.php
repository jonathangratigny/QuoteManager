<?php
require '../Controllers/dashboard-controller.php';
require '../Controllers/header-controller.php';
?>
<?php if (empty($_SESSION['u_id'])) {
    $limitedAccess = 'Please log in before accessing this page.';
?>

    <body class="bg-light">
        <a href="../index.php"><span> <?= $limitedAccess; ?></span></a>
    <?php } else { ?>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-text"> Welcome to Dashboard, <?= $_SESSION['u_username'] ?? null ?></span>
                <div class="d-flex">
                    <div class="row">
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
        <h1 class="display-6">Quotation History</h1>
        <?php foreach ($showProjectData as $value) : ?>
            <?php $getShippingLineWithID = $shippingLineObj->getShippingLineWithID($value['sl_id']); ?>
            <div class="container my-3">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto mb-3">
                            <div class="fw-bold">Project Ref : <?= $value['project_ref'] ?? null ?></div>
                            <span class="badge bg-success rounded-pill d-flex flex-wrap">Created By <?= $projectOwnerWithID['u_username'] ?? null ?> , <?= $dateDifferenceProjectAndNow['creating_interval'] ?? null ?> days ago</span>
                            <div>Port Of Loading : <?= $value['project_POL'] ?? null ?></div>
                            <div>Port Of Discharge : <?= $value['project_POD'] ?? null ?></div>
                            <div>Carrier : <?= $getShippingLineWithID->sl_name ?? null ?></div>
                            <div>Creating Date : <?= $value['project_created_at'] ?? null ?></div>
                            <button type="button" data-project="<?= $value['project_ref'] ?? null ?>" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#quote<?= $indexModal ?>">View more</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#quote<?= $indexModal ?>">Delete Project</button>

                        </div>
                    </li>
                </ol>
                <!-- Modal -->
                <div class="modal fade" id="quote<?= $indexModal ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
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
                                <div class="modal-body">
                                    <ul class="list-group ">
                                        <li class="list-group-item">
                                            <p><?= $dataContainer['container_df_type'] ?> - Container #<?= $i ?></p>
                                            <div> Widht : <?= $dataContainer['container_df_type'] == '40FR' ? $maxWidthContainer['max_width'] . 'cm => ' . (($maxWidthContainer['max_width'] - $getContainerDimensions['container_df_width']) / 2) . ' Over Width Each Sides.' : ($dataContainer['container_df_type'] == '20FR' ? $maxWidthContainer['max_width'] . 'cm => ' . (($maxWidthContainer['max_width'] - $getContainerDimensions['container_df_width']) / 2) . ' Over Width Each Sides.'  : ($dataContainer['container_df_type'] == '40HC' ? $getContainerDimensions['container_df_width'] . 'cm' : ($dataContainer['container_df_type'] == '20GP' ? $getContainerDimensions['container_df_width'] . 'cm' : 'Error'))) ?> </div>

                                            <div> Height : <?= $dataContainer['container_df_type'] == '40FR' ? $maxHeightContainer['max_height'] . 'cm => ' . ($maxHeightContainer['max_height'] - $getContainerDimensions['container_df_height']) . 'cm Over Height.' : ($dataContainer['container_df_type'] == '20FR' ? $maxHeightContainer['max_height'] . 'cm => ' . ($maxHeightContainer['max_height'] - $getContainerDimensions['container_df_height']) . 'cm Over Height.' : ($dataContainer['container_df_type'] == '40HC' ? $getContainerDimensions['container_df_height'] . 'cm' : ($dataContainer['container_df_type'] == '20GP' ? $getContainerDimensions['container_df_height'] . 'cm' : 'Error'))) ?> </div>
                                            <div> Gross weight : <?= $totalGrossWeight['total_gross_weight'] ?>kg</div>
                                        </li>
                                    </ul>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <div class="modal-footer d-flex bd-highlight mb-3">
                                <form action="" method="post" class="me-auto">
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