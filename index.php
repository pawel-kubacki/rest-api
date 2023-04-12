<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css" />
    <title>Cars</title>
</head>

<body>
    <div id="mainWrapper">
        <div class="wrapper">
            <h3>Dane obecnych klientów: </h3>
            <button type="button" id="buttonGetAllClients">Pobierz listę klientów</button>
            <select id="list">
                <option selected>Lista klientów</selected>
            </select>
            <button type="button" id="buttonGetOneClient">Pobierz dane klienta</button>
            <button type="button" id="buttonCheckAssignedCars" disabled>Samochody używane obecnie</button>
            <div class="wrapper" id="dataOfClient"></div>
            <button type="button" id="buttonDeleteClient" disabled>Usuń klienta z bazy</button>
            <button type="button" id="buttonEditClient" disabled>Edytuj klienta</button>
        </div>

        <div class="wrapper" id="wrapperAddNewUser">
            <h3>Dodaj nowego użytkownika: </h3>
            <label>Podaj imię: </label>
            <input type="text" id="inputName" name="inputName" />
            <label>Podaj nazwisko: </label>
            <input type="text" id="inputSurname" name="inputSurname" />
            <label>Podaj email: </label>
            <input type="email" id="inputEmail" name="inputEmail" />
            <label>Podaj hasło: </label>
            <input type="current-password" id="inputPassword" name="inputPassword" />
            <label>Powtórz hasło: </label>
            <input type="repeat-password" id="inputRepeatPassword" name="inputRepeatPassword" />
            <p id="error"></p>
            <button type="button" id="buttonSaveClient">Zapisz w bazie</button>
        </div>

        <div class="wrapper" id="wrapperEditUser">
            <h3>Edytuj użytkownika: </h3>
            <label>Edytuj imię: </label>
            <input type="text" id="inputEditName" name="inputEditName" />
            <label>Edytuj nazwisko: </label>
            <input type="text" id="inputEditSurname" name="inputEditSurname" />
            <label>Edytuj email: </label>
            <input type="email" id="inputEditEmail" name="inputEditEmail" />
            <p id="editError"></p>
            <button type="button" id="buttonSaveEditClient">Zapisz zmiany</button>
            <button type="button" id="buttonCancelEditClient">Wróć</button>
        </div>

        <div class="wrapper" id="wrapperDeleteUser">
            <h3>Ostrzeżenie!!! </h3>
            <p id="deleteAtentionParagraph"></p>
            <button type="button" id="buttonSubmitDeleteClient">Potwierdź</button>
            <button type="button" id="buttonCancelDeleteClient">Anuluj</button>
        </div>
    </div>
    <script type="text/javascript" src="./js/index.js"></script>
    <script type="text/javascript" src="./frontEndActions/auxiliary.js"></script>
    <script type="text/javascript" src="./frontEndActions/getAllClients.js"></script>
    <script type="text/javascript" src="./frontEndActions/getOneClient.js"></script>
    <script type="text/javascript" src="./frontEndActions/addNewClient.js"></script>
    <script type="text/javascript" src="./frontEndActions/editClient.js"></script>
    <script type="text/javascript" src="./frontEndActions/deleteClient.js"></script>
    <script type="text/javascript" src="./frontEndActions/checkUsedCars.js"></script>
</body>

</html>