<?php
require '../Controllers/step2-controller.php';
require '../Controllers/header-controller.php';
var_dump($_POST);
// var_dump($_SESSION);
?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-text">
            STEP 2 ON 3
        </span>
        <label for="customRange2" class="form-label">Example range</label>
        <button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button>
    </div>
</nav>

<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:67%">67%</div>
</div>

<div class="container-fluid">
    <div class="container-fluid text-center">
        <div class="input-group mb-3">
            <div class="btn-group" role="group" aria-label="">
                <button type="button" class="btn btn-primary" data-btn="0" id="40HCbtn">40HC</button>
                <button type="button" class="btn btn-primary" data-btn="1" id="20GPbtn">20GP</button>
                <button type="button" class="btn btn-primary" data-btn="2" id="20FRbtn">20FR</button>
                <button type="button" class="btn btn-primary" data-btn="3" id="40FRbtn">40FR</button>
            </div>
        </div>
    </div>
</div>

<div class="hiddenRow" style="display:none">
    <tr class="tableRow">
        <td><input class="border-0 form-control" type="text" data-ref="ref" name="crate[index][ref]" maxlength="10" placeholder="ref..."></td>
        <td><input class="border-0 form-control" type="number" data-crate="length" name="crate[index][length]" max="3"></td>
        <td><input class="border-0 form-control" type="number" data-crate="width" name="crate[index][width]" max="2"></td>
        <td><input class="border-0 form-control" type="number" data-crate="height" name="crate[index][height]" max="2"></td>
        <td><input class="border-0 form-control" type="number" data-crate="weight" name="crate[index][gross_weight]" max="5"></td>
        <td><input class="border-0 form-control" type="number" data-crate="volume" name="crate[index][volume]" readonly></td>
    </tr>
</div>

<form action="" method="POST">

    <div class="table-responsive" id="tableContainer">
        <!-- HERE inputs -->
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">Crate Ref</th>
                    <th scope="col">Length in cm</th>
                    <th scope="col">Width in cm</th>
                    <th scope="col">Height in cm</th>
                    <th scope="col">Weight in kg</th>
                    <th scope="col">Volume in m3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <button onclick="addRowToTable">Add a line</button>
                        <button onclick="removeRowFromTable">Remove a line</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Click me</button>
                    </td>
                </tr>
        </table>
    </div>
    <div id="buttonsCase" class="container-fluid text-center"></div>

</form>


<script>
    //get the value of container from controller
    let defaultContainerValue = <?= $arrayContainerData ?>;

    const addRowToTable = () => {
        // 1. get number of ongoing .tableRow in the table => document.querySelectorAll('form .tableRow').length
        // 2. clone table row (from hidden row) => const clone = document.querySelector('.hiddenRow .tableRow').cloneNode(true) // true because the argument by default is false, and means => deep clone
        // 3. Loop on children of the clones hidden row => (https://developer.mozilla.org/fr/docs/Web/API/Node/childNodes) to get childNode of childNode
        // 4. replace [index] in each input (attribute name) by [{nbRow}] => childElement.setAttribute('name', childElement.attribute('name').replace('[index]', `[${nbRow}]`))
        // 5. append to tbody
        // 6. add row eventListeners (bubbling row)
    }
    const removeRowFromTale = () => {
        // remove row eventListeners
        // remove last tr from table
    }
    const addRowListeners = (row) => {
        document.querySelector(row).addEventListener('change', (event) => {
            // event.currentTarget => input
            // get input data-crate
            // switch(data-crate)
            // case: ""
        })
    }
</script>
<script src="../assets/js/step2.js"></script>
<?php
include '../Controllers/footer-controller.php';
?>


<script>
    //get the value of container from controller
    let defaultContainerValue = <?= $arrayContainerData ?>;
</script>
<script src="../assets/js/step2.js"></script>
<?php
include '../Controllers/footer-controller.php';
?>