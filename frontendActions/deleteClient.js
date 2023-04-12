const deleteClient = () => {

    const userData = {
        id: findIdOfClient(list)
    }

    fetch("backendActions/deleteClient.php", {
        method: "post",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ jsondata: userData })
    })
        .then(res => res.json())
        .then(res => {
            getAllClients();
            clearDataofClient();
            deleteAtentionParagraph.innerHTML = res;
            buttonSubmitDeleteClient.style.visibility = "hidden";
            buttonCancelDeleteClient.innerHTML = "wróć";
        })
        .catch((error) => {
            deleteAtentionParagraph.innerHTML = "Błąd usuwania klienta, spróbuj ponownie później."
            // console.error("Error:", error);
        });
}
buttonSubmitDeleteClient.addEventListener('click', deleteClient);