const getOneClient = () => {

    const userData = {
        id: findIdOfClient(list)
    }

    fetch("backendActions/getOneClient.php", {
        method: "post",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ jsondata: userData })
    })
        .then(res => res.json())
        .then(res => {
            buttonDeleteClient.disabled = false;
            buttonEditClient.disabled = false;
            buttonCheckAssignedCars.disabled = false;
            dataOfClient.innerHTML = "";
            if (res[0].assigned_employee && res[0].recently_purchased && res[0].total_amount && res[0].assigned_car) {
                const p = document.createElement('p');
                p.innerHTML = "Przypisany pracownik: " + "<strong>" + res[0].assigned_employee + ",<br />" + "</strong>" + "Ostatnio kupione: " + "<strong>" + res[0].recently_purchased + ",<br />" + "</strong>" + "Suma zakupów: " + "<strong>" + res[0].total_amount + ",<br />" + "</strong>" + "Przypisany ssamochód: " + "<strong>" + res[0].assigned_car + ".<br />" + "</strong>";
                dataOfClient.appendChild(p);
            }
        })
        .catch((error) => {
            dataOfClient.innerHTML = "Brak danych lub dane niekompletne."
            // console.error("Error:", error);
        });
}
buttonGetOneClient.addEventListener('click', getOneClient);