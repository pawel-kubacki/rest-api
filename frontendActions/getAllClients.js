const getAllClients = () => {

    fetch("backendActions/getAllClients.php")
        .then(data => data.json())
        .then(data => {
            list.innerHTML = '';
            for (i = 0; i < data.length; i++) {
                const option = document.createElement('option');
                option.id = data[i].id;
                option.innerHTML = data[i].firstname + " " + data[i].surname;
                list.appendChild(option);
            };
        })
        .catch((error) => {
            dataOfClient.innerHTML = "Błąd pobierania danych z bazy."
            // console.error("Error:", error);
        });
}
buttonGetAllClients.addEventListener('click', getAllClients);