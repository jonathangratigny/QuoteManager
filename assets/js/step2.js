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
            <td><input class="border-0 form-control" type="number" data-crate="length" name="crate_length_R1_V${index}" id="crate_length_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="width" name="crate_width_R1_V${index}" id="crate_width_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="height" name="crate_height_R1_V${index}" id="crate_height_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_R1_V${index}" id="crate_gross_weight_R1_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="volume" name="crate_volume_R1_V${index}" id="crate_volume_R1_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R2_V${index}" id="crate_ref_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="length" name="crate_length_R2_V${index}" id="crate_length_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="width" name="crate_width_R2_V${index}" id="crate_width_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="height" name="crate_height_R2_V${index}" id="crate_height_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_R2_V${index}" id="crate_gross_weight_R2_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="volume" name="crate_volume_R2_V${index}" id="crate_volume_R2_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R3_V${index}" id="crate_ref_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="length" name="crate_length_R3_V${index}" id="crate_length_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="width" name="crate_width_R3_V${index}" id=crate_width_R3_V${index}></td>
            <td><input class="border-0 form-control" type="number" data-crate="height" name="crate_height_R3_V${index}" id="crate_height_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_R3_V${index}" id="crate_gross_weight_R3_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="volume" name="crate_volume_R3_V${index}" id="crate_volume_R3_V${index}"></td>
        </tr>
        <tr>
            <td><input class="border-0 form-control" type="text" data-crate="ref" name="crate_ref_R4_V${index}" id="crate_ref_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="length" name="crate_length_R4_V${index}" id="crate_length_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="width" name="crate_width_R4_V${index}" id="crate_width_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="height" name="crate_height_R4_V${index}" id="crate_height_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_R4_V${index}" id="crate_gross_weight_R4_V${index}"></td>
            <td><input class="border-0 form-control" type="number" data-crate="volume" name="crate_volume_R4_V${index}" id="crate_volume_R4_V${index}"></td>
        </tr>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td><input class="border-0 form-control" type="text" name="total_crate_V${index}" id="crate_ref_V${index}"readonly></td>
            <td><input class="border-0 form-control" type="number" name="total_length_V${index}" id="crate_length_V${index}" readonly></td>
            <td><input class="border-0 form-control" type="number" name="max_width_V${index}" id="crate_width_V${index}"readonly></td>
            <td><input class="border-0 form-control" type="number" name="max_height_V${index}" id="crate_height_V${index}"readonly></td>
            <td><input class="border-0 form-control" type="number" name="total_gross_weight_V${index}" id="crate_weight_V${index}"readonly></td>
            <td><input class="border-0 form-control" type="number" name="total_volume_V${index}" id="crate_volume_V${index}"readonly></td>
        </tr>
    </tfoot>`

    //count for total crates
    countRef = 0;
    const totalRef = document.querySelectorAll("[data-crate = 'ref']");
    totalRef.forEach(crate_ref => {
        crate_ref.addEventListener('change', function () {

            if (crate_ref.value != '') {
                countRef++;
            }
            if (crate_ref.value == '') {
                countRef--;
            }

            let crates = document.getElementById(`crate_ref_V${index}`);
            if (countRef > 1) {
                crates.value = countRef + " Crates";
            } else {
                crates.value = countRef + " Crate";

            }
        })
    });

    //count for total length
    countLength = 0;
    const dataLength = document.querySelectorAll("[data-crate = 'length']");
    const length = document.getElementById(`crate_length_V${index}`);
    dataLength.forEach(crate_length => {
        crate_length.addEventListener('change', function () {
            first = document.getElementById(`crate_length_R1_V${index}`).value;
            second = document.getElementById(`crate_length_R2_V${index}`).value;
            third = document.getElementById(`crate_length_R3_V${index}`).value;
            fourth = document.getElementById(`crate_length_R4_V${index}`).value;
            countLength = +first + +second + +third + +fourth;
            length.value = countLength;

            if (length.value >= 590) {
                alert('overlength in this container.')
                length.value = '';
            }
        })
    });

    //count for max width
    const dataWidth = document.querySelectorAll("[data-crate = 'width']");
    const countMaxWidth = document.getElementById(`crate_width_V${index}`);
    dataWidth.forEach(crate_width => {
        crate_width.addEventListener('change', function () {
            first = document.getElementById(`crate_width_R1_V${index}`).value;
            second = document.getElementById(`crate_width_R2_V${index}`).value;
            third = document.getElementById(`crate_width_R3_V${index}`).value;
            fourth = document.getElementById(`crate_width_R4_V${index}`).value;
            maxWidth = Math.max(first, second, third, fourth);
            countMaxWidth.value = maxWidth;

            //case if one crate is >234
            dataWidth.forEach(bigValue => {
                if (bigValue.value > 234) {
                    alert('please update this line, it\'s over width.');
                    bigValue.focus;
                    bigValue.setActive;
                    bigValue.select();
                    countMaxWidth.value = '';
                }
            });
        });
    });

    //count for max height
    const dataHeight = document.querySelectorAll("[data-crate = 'height']");
    const countMaxHeight = document.getElementById(`crate_height_V${index}`);
    dataHeight.forEach(crate_height => {
        crate_height.addEventListener('change', function () {
            first = document.getElementById(`crate_height_R1_V${index}`).value;
            second = document.getElementById(`crate_height_R2_V${index}`).value;
            third = document.getElementById(`crate_height_R3_V${index}`).value;
            fourth = document.getElementById(`crate_height_R4_V${index}`).value;
            maxHeight = Math.max(first, second, third, fourth);
            countMaxHeight.value = maxHeight;

            //case if one crate is >228
            dataHeight.forEach(bigValue => {
                if (bigValue.value > 228) {
                    alert('please update this line, it\'s over height.');
                    bigValue.focus;
                    bigValue.setActive;
                    bigValue.select();
                    countMaxWidth.value = '';

                }
            })
        })
    });

    //count for total weight
    countWeight = 0;
    const dataWeight = document.querySelectorAll("[data-crate = 'weight']");
    const countdataWeight = document.getElementById(`crate_weight_V${index}`);
    dataWeight.forEach(crate_weight => {
        crate_weight.addEventListener('change', function () {
            first = document.getElementById(`crate_gross_weight_R1_V${index}`).value;
            second = document.getElementById(`crate_gross_weight_R2_V${index}`).value;
            third = document.getElementById(`crate_gross_weight_R3_V${index}`).value;
            fourth = document.getElementById(`crate_gross_weight_R4_V${index}`).value;

            countWeight = +first + +second + +third + +fourth;
            countdataWeight.value = countWeight;

            if (countdataWeight.value > 28250) {
                alert(`${countdataWeight.value} is over container payload !`);
                countdataWeight.value = '';
            }
        })
    })

    //count for volume
    countVolumeR1 = 0;
    countVolumeR2 = 0;
    countVolumeR3 = 0;
    countVolumeR4 = 0;

    const dataVolume = document.querySelectorAll('[data-crate="height"]');
    const volumeR1 = document.getElementById(`crate_volume_R1_V${index}`);
    const volumeR2 = document.getElementById(`crate_volume_R2_V${index}`);
    const volumeR3 = document.getElementById(`crate_volume_R3_V${index}`);
    const volumeR4 = document.getElementById(`crate_volume_R4_V${index}`);
    const countdataVolume = document.getElementById(`crate_volume_V${index}`);

    dataVolume.forEach(volume_crate => {
        volume_crate.addEventListener('change', function () {
            lengthR1 = document.getElementById(`crate_length_R1_V${index}`).value;
            widthR1 = document.getElementById(`crate_width_R1_V${index}`).value;
            heightR1 = document.getElementById(`crate_height_R1_V${index}`).value;
            if (heightR1 != '') {
                countVolumeR1 = (+lengthR1 * +widthR1 * +heightR1) / 1000000;
                roundCountVolumeR1 = countVolumeR1 * 100;
                roundCountVolumeR1 = Math.round(roundCountVolumeR1);
                volumeR1.value = roundCountVolumeR1 / 100;
            }

            lengthR2 = document.getElementById(`crate_length_R2_V${index}`).value;
            widthR2 = document.getElementById(`crate_width_R2_V${index}`).value;
            heightR2 = document.getElementById(`crate_height_R2_V${index}`).value;
            if (heightR2 != '') {
                countVolumeR2 = (+lengthR2 * +widthR2 * +heightR2) / 1000000;
                roundCountVolumeR2 = countVolumeR2 * 100;
                roundCountVolumeR2 = Math.round(roundCountVolumeR2);
                volumeR2.value = roundCountVolumeR2 / 100;
            }

            lengthR3 = document.getElementById(`crate_length_R3_V${index}`).value;
            widthR3 = document.getElementById(`crate_width_R3_V${index}`).value;
            heightR3 = document.getElementById(`crate_height_R3_V${index}`).value;
            if (heightR3 != '') {
                countVolumeR3 = (+lengthR3 * +widthR3 * +heightR3) / 1000000;
                roundCountVolumeR3 = countVolumeR3 * 100;
                roundCountVolumeR3 = Math.round(roundCountVolumeR3);
                volumeR3.value = roundCountVolumeR3 / 100;
            }

            lengthR4 = document.getElementById(`crate_length_R4_V${index}`).value;
            widthR4 = document.getElementById(`crate_width_R4_V${index}`).value;
            heightR4 = document.getElementById(`crate_height_R4_V${index}`).value;
            if (heightR4 != '') {
                countVolumeR4 = (+lengthR4 * +widthR4 * +heightR4) / 1000000;
                roundCountVolumeR4 = countVolumeR4 * 100;
                roundCountVolumeR4 = Math.round(roundCountVolumeR4);
                volumeR4.value = roundCountVolumeR4 / 100;
            }

            countdataVolume.value = (countVolumeR1 + countVolumeR2 + countVolumeR3 + countVolumeR4);
        })
    })


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