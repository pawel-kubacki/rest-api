const addNewClient = () => {

    const newUser = {
        firstname: inputName.value,
        surname: inputSurname.value,
        email: inputEmail.value,
        password: inputPassword.value,
        repeatPassword: inputRepeatPassword.value,
    }

    fetch("backendActions/addNewClient.php", {
        method: "post",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ jsondata: newUser })
    })
        .then(res => res.json())
        .then(res => {
            getAllClients();
            if (res == "Dodano klienta do bazy.") {
                buttonSaveClient.style.display = "none";
                error.style.color = "green";
                clearDataofClient();
            }
            error.innerHTML = res;
        })
        .catch((error) => {
            dataOfClient.innerHTML = "Błąd dodawania danych do bazy. Spróbuj ponownie poźniej."
            // console.error("Error:", error);
        });
}
buttonSaveClient.addEventListener('click', addNewClient);