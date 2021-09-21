<?php
require '../Controllers/update-crate-controller.php';
require '../Controllers/header-controller.php';
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-text"> Project number : , <?= $_SESSION['u_username'] ?? null ?></span>
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
<form action="" method="post">
    <table class="table table-bordered table-sm">
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
                    </button></td>
</form>
<script>
    //blocking the entry of e + - in input
    let inputBox = document.querySelectorAll("[data-crate]");
    let invalidChars = [
        "-",
        "+",
        "e",
    ];
    inputBox.forEach(element => {
        element.addEventListener("input", function() {
            this.value = this.value.replace(/[e\+\-]/gi, "");
            element.addEventListener("keydown", function(e) {
                if (invalidChars.includes(e.key)) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
<?php
include '../Controllers/footer-controller.php';
?>