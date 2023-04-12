const checkUsedCars = () => {

    const userData = {
        id: findIdOfClient(list)
    }

    fetch("backendActions/checkUsedCars.php", {
        method: "post",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ jsondata: userData })
    })
        .then(res => res.json())
        .then(res => {
            dataOfClient.innerHTML = "";
            if (res[0].firstname && res[0].surname && res[0].model) {
                const p = document.createElement('p');
                p.innerHTML = "<strong>" + res[0].firstname + " " + res[0].surname + "</strong>" + " obecnie używa: " + "<strong>" + res[0].model + ". " + "</strong>";
                dataOfClient.appendChild(p);
            }
        })
        .catch((error) => {
            dataOfClient.innerHTML = "Błąd pobierania danych."
            // console.error("Error:", error);
        });
}
buttonCheckAssignedCars.addEventListener('click', checkUsedCars);