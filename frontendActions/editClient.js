const editClient = () => {

    const newUser = {
        id: findIdOfClient(list),
        firstname: inputEditName.value,
        surname: inputEditSurname.value,
        email: inputEditEmail.value,
    };

    fetch("backendActions/editClient.php", {
        method: "post",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ jsondata: newUser })
    })
        .then(res => res.json())
        .then(res => {
            editError.innerHTML = res;
            if (res == "Dokonano edycji danych.") {
                buttonSaveEditClient.style.display = "none";
                editError.style.color = "green";
            }
        })
        .catch((error) => {
            editError.innerHTML = "Błąd dodawania danych do bazy. Spróbuj ponownie poźniej."
            // console.error("Error:", error);
        });
}
buttonSaveEditClient.addEventListener('click', editClient);