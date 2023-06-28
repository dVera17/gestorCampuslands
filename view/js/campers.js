document.addEventListener("DOMContentLoaded", (e) => {
    fillTable();
    fillSelectRegiones();
});

const config = {
    headers: {
        "Content-Type": "application/json",
    },
}

// const postData = async (data) => {
//     config.method = "POST";
//     config.body = JSON.stringify({
//         "nombre": data.nombre,
//         "precio": data.precio,
//         "descripcion": data.descripcion
//     });
//     let res = await (await fetch("http://localhost/ApolT01-063/gestorCampuslands/uploads/campers", config)).json();
//     location.reload();
//     return res;
// }

const getData = async () => {
    config.method = "GET";
    delete config.body;
    let res = await (await fetch("http://localhost/ApolT01-063/gestorCampuslands/uploads/campers", config)).json();
    return res;
}

const getRegiones = async () => {
    config.method = "GET";
    delete config.body;
    let res = await (await fetch("http://localhost/ApolT01-063/gestorCampuslands/uploads/region", config)).json();
    return res;
}

const deleteData = async (id) => {
    config.method = "DELETE";
    config.body = JSON.stringify({
        "idCamper": id
    });
    let res = await (await fetch("http://localhost/ApolT01-063/gestorCampuslands/uploads/campers", config)).json();
    location.reload();
    return res;
}

const fillTable = async () => {
    let dataTable = document.querySelector('#dataTable');
    let data = await getData();
    data.forEach(x => {
        let tr = document.createElement('tr');
        tr.innerHTML = `
        <th scope="row">${x.idCamper}</th>
        <td>${x.nombreCamper}</td>
        <td>${x.apellidoCamper}</td>
        <td>${x.fechaNac}</td>
        <td>${x.idReg}</td>
        <td><button type="button" class="btnEliminar" data-id="${x.idCamper}"><i class='bx bx-trash'></i></button></td>
        `;
        dataTable.appendChild(tr);
    });

    let btnEliminar = document.querySelectorAll('.btnEliminar');
    btnEliminar.forEach(btn => {
        btn.addEventListener('click', () => {
            let id = btn.dataset.id;
            console.log(id);
            deleteData(parseInt(id));
        })
    })
}

const fillSelectRegiones = async () => {
    let selectRegion = document.querySelector('#selectRegion');
    let regiones = await getRegiones();
    regiones.forEach(x => {
        selectRegion.innerHTML = `
        <option value="${x.idReg}">${x.nombreReg}</option>
        `;
    });
}
