const tableContainer = document.getElementById('tableContainer');
const addContainerBtn = document.querySelectorAll("[data-btn]");
let index = 0;


//click on button to print a tab to fill
//limit is 4 rows per containers
addContainerBtn.forEach(button => {
    button.addEventListener('click', function () {
        index++;

        //creating the table
        let newTable = document.createElement("table");
        newTable.setAttribute("class", "table table-bordered table-sm");
        newTable.setAttribute("id", defaultContainerValue[button.dataset.btn]['container_df_type'] + index);
        tableContainer.append(newTable);

        //creating the trash button
        let newButton = document.createElement("button");
        newButton.setAttribute("class", "btn btn-danger");
        newButton.setAttribute("data-trash", defaultContainerValue[button.dataset.btn]['container_df_type'] + index);
        newButton.setAttribute("type", "button");
        newButton.innerText = "Delete Container";
        newButton.value = `delete${index}`
        tableContainer.append(newButton);

        //filling the table
        newTable.innerHTML = `
        <caption>Container ${defaultContainerValue[button.dataset.btn]['container_df_type']}</caption>

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

        //creating div to contain buttons
        let divButtons = document.createElement("div");
        divButtons.setAttribute("class", "container-fluid text-center");
        divButtons.setAttribute("id", "submit_step_2");
        tableContainer.append(divButtons);
        const submit_step_2 = document.getElementById("submit_step_2");

        //creating back button
        let backButton = document.createElement("button");
        backButton.setAttribute("class", "btn btn-secondary");
        backButton.setAttribute("type", "button");
        backButton.innerText = "Back";
        submit_step_2.append(backButton);

        //creating next button
        let nextButton = document.createElement("button");
        nextButton.setAttribute("class", "btn btn-primary");
        nextButton.setAttribute("type", "submit");
        nextButton.innerText = "Next";
        nextButton.value = "step2"
        submit_step_2.append(nextButton);


        //delete a container
        let buttontrash = document.querySelectorAll('button[data-trash]')
        buttontrash.forEach(button => {
            button.addEventListener('click', function () {
                if (button.dataset.trash == newTable.id) {
                    var result = confirm("Are you sure to delete?");
                    if (result) {
                        tableContainer.removeChild(newTable);
                        tableContainer.removeChild(button);
                    }
                }
            });
        });

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
                } else if (countRef == 0) {
                    crates.value = '';
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

                //case if one crate is >max length
                dataLength.forEach(bigValue => {
                    if (bigValue.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_length'])) {
                        alert(`please update this line, ${bigValue.value}cm is over length.`);
                        bigValue.focus;
                        bigValue.setActive;
                        bigValue.select();
                        length.value = '';
                    }
                })

                if (length.value >= parseInt(defaultContainerValue[button.dataset.btn]['container_df_length'])) {
                    alert(`Overlength in ${defaultContainerValue[button.dataset.btn]['container_df_type']} (${parseInt(defaultContainerValue[button.dataset.btn]['container_df_length'])}cm max), please check the lengths.`)
                    length.value = '';
                } else if (length.value == 0) {
                    length.value = '';
                }
            })
        });

        //bring ID of table to target the difference 
        //between FR and GP/HC container
        //FR has no width and height limits
        const checkID = newTable.id;

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

                //case if one crate is > max width
                dataWidth.forEach(bigValue => {
                    if (!checkID.includes('FR')) {
                        if (bigValue.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_width'])) {
                            alert(`please update this line, ${bigValue.value}cm is over width in ${defaultContainerValue[button.dataset.btn]['container_df_type']}.`);
                            bigValue.focus;
                            bigValue.setActive;
                            bigValue.select();
                            countMaxWidth.value = '';
                        }
                    }
                })
            })
        })
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

                //case if one crate is > max height
                dataHeight.forEach(bigValue => {
                    if (!checkID.includes('FR')) {
                        if (bigValue.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_height'])) {
                            alert(`please update this line, ${bigValue.value}cm over height in ${defaultContainerValue[button.dataset.btn]['container_df_type']}.`);
                            bigValue.focus;
                            bigValue.setActive;
                            bigValue.select();
                            countMaxWidth.value = '';
                        }
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

                if (countdataWeight.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_payload'])) {
                    alert(`${countdataWeight.value}kg is over payload in ${defaultContainerValue[button.dataset.btn]['container_df_type']}!`);
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
})