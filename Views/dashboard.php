<?php
require '../Controllers/dashboard-controller.php';
require '../Controllers/header-controller.php';
?>

<body class="bg-light">
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
    <div class="container my-3">
        <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto mb-3">
                    <div class="fw-bold">Project Ref : <?= $showProjectData['project_ref'] ?? null ?></div>
                    <div>Port Of Loading : <?= $showProjectData['project_POL'] ?? null ?></div>
                    <div>Port Of Discharge : <?= $showProjectData['project_POD'] ?? null ?></div>
                    <div>Carrier : <?= $getShippingLineOnproject['sl_name'] ?? null ?></div>
                    <div>Creating Date : <?= $showProjectData['project_created_at'] ?></div>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#quote1">View more</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#quote1">Delete Project</button>

                </div>
                <span class="badge bg-success rounded-pill">Created By <?= $projectOwnerWithID['u_username']  . ', ' . $dateDifferenceProjectAndNow['creating_interval'] ?> days ago</span>
            </li>
        </ol>

        <!-- Modal -->
        <div class="modal fade" id="quote1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container">
                            <div class="row">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                <h5 class="modal-title text-center" id="exampleModalLabel"><?= $showProjectData['project_ref'] ?? null . ' ' . $showProjectData['project_POL'] ?? null . ' - ' . $showProjectData['project_POD'] ?? null ?>
                                </h5>
                                <span class="modal-body text-center" id="exampleModalLabel">Carrier : <?= $getShippingLineOnproject['sl_name'] ?? null ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group ">
                            <li class="list-group-item">
                                <p> Container #1 : 40FR OH OW</p>
                                <div> Widht : 460cm => OW : 40cm each sides </div>
                                <div> Height : 420cm => OH : 120 cm </div>
                                <div> Gross weight : 18000 KG</div>
                            </li>
                            <small class="text-muted d-flex justify-content-end">created <?= $dateDifferenceProjectAndNow['creating_interval'] ?> days ago</small>
                        </ul>
                    </div>
                    <div class="modal-footer d-flex bd-highlight mb-3">
                        <form action="" method="post" class="me-auto">
                            <button type="submit" name="delete_project" value="63" class="btn btn-danger p-2 bd-highlight">Delete Project</button>
                        </form>
                        <button type="button" class="btn btn-secondary p-2 bd-highlight" data-bs-dismiss="modal">Close</button>
                        <form action="./project-view.php" method="post">
                            <input type="hidden" value="<?= $showProjectData['project_id'] ?>" name="view_project">
                            <button type="submit" class="btn btn-primary p-2 bd-highlight">Update</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <h2 class="display-6">Carrier directory</h2>
    <div class="container">
        <ul class="list-group"></ul>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 border-top">
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