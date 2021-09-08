<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button type="button" class="btn btn-primary" id="40FRbtn">40FR</button>
    <form action="" method="post" class="table-responsive" id="tableContainer">



    </form>

    <script>
        const tableContainer = document.getElementById('tableContainer');
        const table40FR = document.getElementById('40FRbtn');
        let test = 1;
        table40FR.addEventListener('click', function() {
            test++;
            let newTable = document.createElement("table");
            newTable.setAttribute("class", "table table-bordered table-sm");
            newTable.setAttribute("id", "40FR" + test);
            tableContainer.append(newTable);


            newTable.innerHTML = `<legend>Container 40FR</legend>
    <thead>
        <tr>
            <th scope="col">Crate Ref</th>
            <th scope="col">Length</th>
            <th scope="col">Width</th>
            <th scope="col">Height</th>
            <th scope="col">Weight</th>
            <th scope="col">Volume</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R1_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R1_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R1_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R1_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R1_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R1_V${test}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R2_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R2_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R2_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R2_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R2_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R2_V${test}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R3_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R3_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R3_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R3_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R3_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R3_V${test}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R4_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R4_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R4_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R4_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R4_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R4_V${test}"></td>
        </tr>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td><input class="border-0 form-control" type="text" name="total_crate_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="total_length_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="max_width_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="max_height_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="total_gross_weight_V${test}"></td>
            <td><input class="border-0 form-control" type="text" name="total_volume_V${test}"></td>
        </tr>
    </tfoot>`

        });
    </script>
</body>

</html>