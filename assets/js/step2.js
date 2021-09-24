const tableContainer = document.getElementById('tableContainer');
const addContainerBtn = document.querySelectorAll("[data-btn]");
let index = 0;

//function to get max value of an array
function max(input) {
    if (toString.call(input) !== "[object Array]")
        return false;
    return Math.max.apply(null, input);
}

//click on button to print a tab to fill
//limit is 4 rows per containers
addContainerBtn.forEach(button => {
    button.addEventListener('click', function () {
        index++;

        //creating the table
        let newTable = document.createElement("table");
        newTable.setAttribute("class", "table table-bordered bg-white");
        newTable.setAttribute("id", defaultContainerValue[button.dataset.btn]['container_df_type'] + index);
        tableContainer.append(newTable);

        //bring ID of table to target the difference 
        //between FR and GP/HC container
        //FR has no width and height limits
        const checkID = newTable.id;

        //creating the trash button
        let newButton = document.createElement("button");
        newButton.setAttribute("class", "btn btn-danger order-1 mb-3 btn-sm");
        newButton.setAttribute("data-trash", defaultContainerValue[button.dataset.btn]['container_df_type'] + index);
        newButton.setAttribute("type", "button");
        newButton.innerText = "Delete Container";
        newButton.value = `delete${index}`
        tableContainer.append(newButton);

        //filling the table
        newTable.innerHTML = `
        <caption class="caption-top">Container ${defaultContainerValue[button.dataset.btn]['container_df_type']}</caption>
        <thead class="text-center align-middle">
            <tr>
                <th>Crate Ref</th>
                <th>Length in cm</th>
                <th>Width in cm</th>
                <th>Height in cm</th>
                <th>Weight in kg</th>
                <th>Volume in m3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input data-crate-ref="V${index}" class="border-0 form-control" type="text" data-ref ="ref" name="crate_ref_R1_V${index}" id="crate_ref_R1_V${index}"  maxlength="10" placeholder="ref..."></td>
                <td><input data-crate-length="V${index}" class="border-0 form-control" type="number" data-crate="length" name="crate_length_R1_V${index}" id="crate_length_R1_V${index}" onkeypress="if (this.value.length > 3) return false;" placeholder="1234..." ></td>
                <td><input data-crate-width="V${index}" class="border-0 form-control" type="number" data-crate="width" name="crate_width_R1_V${index}" id="crate_width_R1_V${index}" onkeypress="if (this.value.length > 2) return false;" placeholder="123..."></td>
                <td><input data-crate-height="V${index}"class="border-0 form-control" type="number" data-crate="height" name="crate_height_R1_V${index}" id="crate_height_R1_V${index}" onkeypress="if (this.value.length > 2) return false;"placeholder="123..."></td>
                <td><input data-crate-weight="V${index}" class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_container_id_${defaultContainerValue[button.dataset.btn]['container_df_id']}_R1_V${index}" id="crate_gross_weight_R1_V${index}" onkeypress="if (this.value.length > 4) return false;"placeholder="12345..."></td>
                <td class="bg-light"><input class="border-0 form-control bg-light" type="number" data-crate="volume" id="crate_volume_R1_V${index}" readonly></td>
            </tr>
            <tr>
                <td><input data-crate-ref="V${index}" class="border-0 form-control" type="text" data-ref ="ref" name="crate_ref_R2_V${index}" id="crate_ref_R2_V${index}" maxlength="10"></td>
                <td><input data-crate-length="V${index}" class="border-0 form-control" type="number" data-crate="length" name="crate_length_R2_V${index}" id="crate_length_R2_V${index}" onkeypress="if (this.value.length > 3) return false;"></td>
                <td><input data-crate-width="V${index}" class="border-0 form-control" type="number" data-crate="width" name="crate_width_R2_V${index}" id="crate_width_R2_V${index}" onkeypress="if (this.value.length > 2) return false;"></td>
                <td><input data-crate-height="V${index}" class="border-0 form-control" type="number" data-crate="height" name="crate_height_R2_V${index}" id="crate_height_R2_V${index}" onkeypress="if (this.value.length > 2) return false;"></td>
                <td><input data-crate-weight="V${index}" class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_container_id_${defaultContainerValue[button.dataset.btn]['container_df_id']}_R2_V${index}" id="crate_gross_weight_R2_V${index}" onkeypress="if (this.value.length > 4) return false;"></td>
                <td class="bg-light"><input class="bg-light border-0 form-control" type="number" data-crate="volume" id="crate_volume_R2_V${index}" readonly></td>
            </tr>
            <tr>
                <td><input data-crate-ref="V${index}" class="border-0 form-control" type="text" data-ref ="ref" name="crate_ref_R3_V${index}" id="crate_ref_R3_V${index}" maxlength="10"></td>
                <td><input data-crate-length="V${index}" class="border-0 form-control" type="number" data-crate="length" name="crate_length_R3_V${index}" id="crate_length_R3_V${index}" onkeypress="if (this.value.length > 3) return false;"></td>
                <td><input data-crate-width="V${index}" class="border-0 form-control" type="number" data-crate="width" name="crate_width_R3_V${index}" id="crate_width_R3_V${index}" onkeypress="if (this.value.length > 2) return false;"></td>
                <td><input data-crate-height="V${index}" class="border-0 form-control" type="number" data-crate="height" name="crate_height_R3_V${index}" id="crate_height_R3_V${index}" onkeypress="if (this.value.length > 2) return false;"></td>
                <td><input data-crate-weight="V${index}" class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_container_id_${defaultContainerValue[button.dataset.btn]['container_df_id']}_R3_V${index}" id="crate_gross_weight_R3_V${index}" onkeypress="if (this.value.length > 4) return false;"></td>
                <td class="bg-light"><input class="bg-light border-0 form-control" type="number" data-crate="volume" id="crate_volume_R3_V${index}" readonly></td>
            </tr>
            <tr>
                <td><input data-crate-ref="V${index}" class="border-0 form-control" type="text" data-ref ="ref" name="crate_ref_R4_V${index}" id="crate_ref_R4_V${index}" maxlength="10"></td>
                <td><input data-crate-length="V${index}" class="border-0 form-control" type="number" data-crate="length" name="crate_length_R4_V${index}" id="crate_length_R4_V${index}" onkeypress="if (this.value.length > 3) return false;"></td>
                <td><input data-crate-width="V${index}" class="border-0 form-control" type="number" data-crate="width" name="crate_width_R4_V${index}" id="crate_width_R4_V${index}" onkeypress="if (this.value.length > 2) return false;"></td>
                <td><input data-crate-height="V${index}" class="border-0 form-control" type="number" data-crate="height" name="crate_height_R4_V${index}" id="crate_height_R4_V${index}" onkeypress="if (this.value.length > 2) return false;"></td>
                <td><input data-crate-weight="V${index}" class="border-0 form-control" type="number" data-crate="weight" name="crate_gross_weight_container_id_${defaultContainerValue[button.dataset.btn]['container_df_id']}_R4_V${index}" id="crate_gross_weight_R4_V${index}" onkeypress="if (this.value.length > 4) return false;"></td>
                <td class="bg-light"><input class="bg-light border-0 form-control" type="number" data-crate="volume" 4_V${index}" id="crate_volume_R4_V${index}" readonly></td>
            </tr>
        </tbody>
        <tfoot class="table-light">
            <tr>
                <td class="bg-light"><input data-crate-total-ref="V${index}" class="bg-light border-0 form-control" type="text" id="crate_ref_V${index}"readonly></td>
                <td class="bg-light"><input data-crate-total-length="V${index}" class="bg-light border-0 form-control" type="number"  id="crate_length_V${index}" readonly placeholder="Length ${defaultContainerValue[button.dataset.btn]['container_df_length']}cm "></td>
                <td class="bg-light"><input data-crate-total-width="V${index}" class="bg-light border-0 form-control" type="number" id="crate_width_V${index}"readonly placeholder="Width ${defaultContainerValue[button.dataset.btn]['container_df_width']}cm "></td>
                <td class="bg-light"><input data-crate-total-height="V${index}" class="bg-light border-0 form-control" type="number"  id="crate_height_V${index}"readonly placeholder="Height ${defaultContainerValue[button.dataset.btn]['container_df_height']}cm "></td>
                <td class="bg-light"><input data-crate-total-weight="V${index}" class="bg-light border-0 form-control" type="number" name="total_gross_weight_V${index}" id="crate_weight_V${index}"placeholder="Payload ${defaultContainerValue[button.dataset.btn]['container_df_payload']}kg "readonly></td>
                <td class="bg-light"><input class="bg-light border-0 form-control" type="number" id="crate_volume_V${index}"readonly></td>
            </tr>
        </tfoot>`
console.log(defaultContainerValue);

        //blocking the entry of e + - in input
        let inputBox = document.querySelectorAll("[data-crate]");
        let invalidChars = [
            "-",
            "+",
            "e",
        ];
        inputBox.forEach(element => {
            element.addEventListener("input", function () {
                this.value = this.value.replace(/[e\+\-]/gi, "");
                element.addEventListener("keydown", function (e) {
                    if (invalidChars.includes(e.key)) {
                        e.preventDefault();
                    }
                });
            });
        });

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
        let dataCrateRef = document.querySelectorAll('[data-crate-ref]')
        dataCrateRef.forEach(element => {
            element.addEventListener('change', function () {
                let testTotal = 0
                let target = this.dataset.crateRef

                let testReturn = document.querySelectorAll(`[data-crate-ref="${target}"]`)
                testReturn.forEach(element => {
                    element.value.length > 0 ? testTotal++ : ''
                })
                let targetTotal = document.querySelector(`[data-crate-total-ref="${target}"]`)
                targetTotal.value = testTotal > 0 ? testTotal + ' Crate(s)' : ''
            })
        });

        //count for total length
        const dataCrateLength = document.querySelectorAll('[data-crate-length]')
        dataCrateLength.forEach(element => {
            element.addEventListener('change', function () {
                let testTotal = [];
                let target = this.dataset.crateLength

                const testReturn = document.querySelectorAll(`[data-crate-length="${target}"]`)
                testReturn.forEach(element => {
                    element.value > 0 ? testTotal.push(parseInt(element.value)) : '';
                })
                const targetTotal = document.querySelector(`[data-crate-total-length="${target}"]`)
                targetTotal.value = testTotal.length > 0 ? testTotal.reduce((a, b) => a + b, 0) : '';

                //case if one crate is >max length
                if (targetTotal.value >= parseInt(defaultContainerValue[button.dataset.btn]['container_df_length'])) {
                    alert(`please update this field, ${targetTotal.value}cm is over length for ${defaultContainerValue[button.dataset.btn]['container_df_type']}.`);
                    targetTotal.value = '';
                }
            })
        })

        //count for max width
        const dataCrateWidth = document.querySelectorAll('[data-crate-width]')
        dataCrateWidth.forEach(element => {
            element.addEventListener('change', function () {
                let testTotal = [];
                let target = this.dataset.crateWidth

                const testReturn = document.querySelectorAll(`[data-crate-width="${target}"]`)
                testReturn.forEach(element => {
                    element.value > 0 ? testTotal.push(parseInt(element.value)) : '';
                })
                const targetTotal = document.querySelector(`[data-crate-total-width="${target}"]`)
                targetTotal.value = max(testTotal) > 0 ? max(testTotal) : '';

                if (!checkID.includes('FR')) {
                    if (targetTotal.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_width'])) {
                        alert(`please update this line, ${targetTotal.value}cm is over width in ${defaultContainerValue[button.dataset.btn]['container_df_type']}.`);
                        targetTotal.value = '';
                    }
                }
            });
        })

        //count for max height
        const dataCrateHeight = document.querySelectorAll('[data-crate-height]')
        dataCrateHeight.forEach(element => {
            element.addEventListener('change', function () {
                let testTotal = [];
                let target = this.dataset.crateHeight

                const testReturn = document.querySelectorAll(`[data-crate-height="${target}"]`)
                testReturn.forEach(element => {
                    element.value > 0 ? testTotal.push(parseInt(element.value)) : '';
                })
                const targetTotal = document.querySelector(`[data-crate-total-height="${target}"]`)
                targetTotal.value = max(testTotal) > 0 ? max(testTotal) : '';

                if (!checkID.includes('FR')) {
                    if (targetTotal.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_height'])) {
                        alert(`please update this line, ${targetTotal.value}cm is over height in ${defaultContainerValue[button.dataset.btn]['container_df_type']}.`);
                        targetTotal.value = '';
                    }
                }
            })
        });

        //count for total weight
        countWeight = 0;
        const dataWeight = document.querySelectorAll("[data-crate-weight]");
        dataWeight.forEach(element => {
            element.addEventListener('change', function () {
                let testTotal = [];
                let target = this.dataset.crateWeight

                const testReturn = document.querySelectorAll(`[data-crate-weight="${target}"]`)
                testReturn.forEach(element => {
                    element.value > 0 ? testTotal.push(parseInt(element.value)) : '';
                })
                const targetTotal = document.querySelector(`[data-crate-total-weight="${target}"]`)
                targetTotal.value = testTotal.length > 0 ? testTotal.reduce((a, b) => a + b, 0) : '';
                console.log(targetTotal.value);
                if (targetTotal.value > parseInt(defaultContainerValue[button.dataset.btn]['container_df_payload'])) {
                    alert(`${targetTotal.value}kg is over payload in ${defaultContainerValue[button.dataset.btn]['container_df_type']}!`);
                    targetTotal.value = '';
                }
            })
        })

        //count for volume
        countVolumeR1 = 0;
        countVolumeR2 = 0;
        countVolumeR3 = 0;
        countVolumeR4 = 0;

        const dataVolume = document.querySelectorAll('[data-crate]');
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
                countdataVolume.value = (countVolumeR1 + countVolumeR2 + countVolumeR3 + countVolumeR4) * 100;
                countdataVolume.value = Math.round(countdataVolume.value);
                countdataVolume.value = countdataVolume.value / 100;
            })
        })
    })
})


//creating back button
let backButton = document.createElement("button");
backButton.setAttribute("class", "btn btn-secondary");
backButton.setAttribute("type", "button");
backButton.setAttribute("onclick", "window.location.href='./step1.php'");
backButton.innerText = "Back";
buttonsCase.append(backButton);

//creating next button
let nextButton = document.createElement("button");
nextButton.setAttribute("class", "btn btn-warning mx-1");
nextButton.setAttribute("type", "submit");
nextButton.innerText = "Next";
buttonsCase.append(nextButton);