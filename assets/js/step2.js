const tableContainer = document.getElementById('tableContainer');
const table20FR = document.getElementById('20FRbtn');
const table40FR = document.getElementById('40FRbtn');
const table20GP = document.getElementById('20GPbtn');
const table40HC = document.getElementById('40HCbtn');
let index = 0; 

table20GP.addEventListener('click', function () {
    index++;
    let newTable = document.createElement("table");
    newTable.setAttribute("class", "table table-bordered table-sm");
    newTable.setAttribute("id", "20GP" + index);
    tableContainer.append(newTable);
    newTable.innerHTML = `
    <caption>Container 20GP #${index}</caption>
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
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R1_V${index}" id="crate_ref_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="length" name="crate_length_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="width" name="crate_width_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="height" name="crate_height_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="weight" name="crate_gross_weight_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="volume" name="crate_volume_R1_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R2_V${index}" id="crate_ref_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="length" name="crate_length_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="width" name="crate_width_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="height" name="crate_height_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="weight" name="crate_gross_weight_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="volume" name="crate_volume_R2_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R3_V${index}" id="crate_ref_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="length" name="crate_length_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="width" name="crate_width_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="height" name="crate_height_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="weight" name="crate_gross_weight_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="volume" name="crate_volume_R3_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R4_V${index}" id="crate_ref_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="length" name="crate_length_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="width" name="crate_width_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="height" name="crate_height_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="weight" name="crate_gross_weight_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" data-crate="volume" name="crate_volume_R4_V${index}"></td>
        </tr>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td><input class="border-0 form-control" type="text" name="total_crate_V${index}" id="crate_ref_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_length_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_width_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_height_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_gross_weight_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_volume_V${index}"></td>
        </tr>
    </tfoot>`

    //
    count = 0;
    const totalRef = document.querySelectorAll("[data-crate = 'ref']");
    totalRef.forEach(crate_ref => {
        crate_ref.addEventListener('change', function () {

            if (crate_ref.value != '') {
                count++;
                console.log(count);
            }
            if (crate_ref.value == '') {
                count--;
                console.log(count);
            }
        })
    });

});

table20FR.addEventListener('click', function () {
    index++;
    let newTable = document.createElement("table");
    newTable.setAttribute("class", "table table-bordered table-sm");
    newTable.setAttribute("id", "20FR" + index);
    tableContainer.append(newTable);
    newTable.innerHTML = `<caption>Container 20FR #${index}</caption>
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
            <td><input class="border-0 form-control" type="text" name="crate_ref_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R1_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R2_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R3_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R4_V${index}"></td>
        </tr>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td><input class="border-0 form-control" type="text" name="total_crate_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_length_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_width_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_height_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_gross_weight_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_volume_V${index}"></td>
        </tr>
    </tfoot>`
});

table40FR.addEventListener('click', function () {
    index++;
    let newTable = document.createElement("table");
    newTable.setAttribute("class", "table table-bordered table-sm");
    newTable.setAttribute("id", "40FR" + index);
    tableContainer.append(newTable);
    newTable.innerHTML = `<caption>Container 40FR #${index}</caption>
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
            <td><input class="border-0 form-control" type="text" name="crate_ref_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R1_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R2_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R3_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R4_V${index}"></td>
        </tr>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td><input class="border-0 form-control" type="text" name="total_crate_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_length_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_width_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_height_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_gross_weight_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_volume_V${index}"></td>
        </tr>
    </tfoot>`
});

table40HC.addEventListener('click', function () {
    index++;
    let newTable = document.createElement("table");
    newTable.setAttribute("class", "table table-bordered table-sm");
    newTable.setAttribute("id", "40HC" + index);
    tableContainer.append(newTable);
    newTable.innerHTML = `<caption>Container 40HC #${index}</caption>
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
            <td><input class="border-0 form-control" type="text" name="crate_ref_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R1_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R2_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R3_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" name="crate_ref_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_length_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_width_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_height_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_gross_weight_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="crate_volume_R4_V${index}"></td>
        </tr>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td><input class="border-0 form-control" type="text" name="total_crate_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_length_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_width_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="max_height_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_gross_weight_V${index}"></td>
            <td><input class="border-0 form-control" type="text" name="total_volume_V${index}"></td>
        </tr>
    </tfoot>`
});