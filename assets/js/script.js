const project_country_dest = document.getElementById('project_country_dest');
const select = document.getElementById('project_POD');

project_country_dest.addEventListener('change', function () {
    select.innerHTML = ''
    fetch('../Controllers/ajax-controller.php?country=' + this.value)
        .then(response => response.json())
        .then(json => {
            select.innerHTML = `<option value="none">Select A Port</option>`;
            json.forEach(element => {
                console.log(element);
                select.innerHTML += `<option value="${element.port_name}">${element.port_name}</option>`
            });
        })
        .catch(error => console.error(error))
})