const list = document.querySelector('#list');
const dataOfClient = document.querySelector('#dataOfClient');
const error = document.querySelector('#error');
const editError = document.querySelector('#editError');
const wrapperEditUser = document.querySelector('#wrapperEditUser');
const wrapperDeleteUser = document.querySelector('#wrapperDeleteUser');
const deleteAtentionParagraph = document.querySelector('#deleteAtentionParagraph');

const inputName = document.querySelector('#inputName');
const inputSurname = document.querySelector('#inputSurname');
const inputEmail = document.querySelector('#inputEmail');
const inputRepeatPassword = document.querySelector('#inputRepeatPassword');
const inputEditName = document.querySelector('#inputEditName');
const inputEditSurname = document.querySelector('#inputEditSurname');
const inputEditEmail = document.querySelector('#inputEditEmail');

const buttonGetAllClients = document.querySelector('#buttonGetAllClients');
const buttonGetOneClient = document.querySelector('#buttonGetOneClient');
const buttonSaveClient = document.querySelector('#buttonSaveClient');
const buttonEditClient = document.querySelector('#buttonEditClient');
const buttonSaveEditClient = document.querySelector('#buttonSaveEditClient');
const buttonCancelEditClient = document.querySelector('#buttonCancelEditClient');
const buttonDeleteClient = document.querySelector('#buttonDeleteClient');
const buttonSubmitDeleteClient = document.querySelector('#buttonSubmitDeleteClient');
const buttonCancelDeleteClient = document.querySelector('#buttonCancelDeleteClient');
const buttonCheckAssignedCars = document.querySelector('#buttonCheckAssignedCars');


const findIdOfClient = (listOfClients) => {
    let findId = '';
    for (i = 0; i < listOfClients.length; i++) {
        if (i == listOfClients.selectedIndex) {
            findId = listOfClients[i].id
        }
    }
    return findId;
}


const showEditForm = () => {
    wrapperEditUser.style.left = "100px";
    const dataToedit = list.value;
    const words = dataToedit.split(' ');
    inputEditName.value = words[0];
    inputEditSurname.value = words[1];
}
buttonEditClient.addEventListener('click', showEditForm);


const cancelShowEditForm = () => {
    wrapperEditUser.style.left = "-500px";
    buttonSaveEditClient.style.display = "";
    editError.innerHTML = "";
    inputEditName.value = "";
    inputEditSurname.value = "";
    inputEditEmail.value = "";
    deleteAtentionParagraph.style.display = "Potwierdż, że napewno chcesz usunąć z bazy danych wszytskie dane dotyczące klienta:";
    buttonCancelDeleteClient.innerHTML = "Anuluj";
}
buttonCancelEditClient.addEventListener('click', cancelShowEditForm);


const deleteAtention = () => {
    buttonSubmitDeleteClient.style.visibility = "visible";
    wrapperDeleteUser.style.left = "100px";
    deleteAtentionParagraph.innerHTML = "Potwierdż, że napewno chcesz usunąć z bazy danych wszytskie dane dotyczące klienta: " + "<strong>" + list.value + "</strong>";
};
buttonDeleteClient.addEventListener('click', deleteAtention);


const cancelDeletAtention = () => {
    wrapperDeleteUser.style.left = "-500px";
}
buttonCancelDeleteClient.addEventListener('click', cancelDeletAtention);


const clearDataofClient = () => {
    dataOfClient.innerHTML = "";
    buttonDeleteClient.disabled = true;
    buttonEditClient.disabled = true;
    buttonCheckAssignedCars.disabled = true;
}
list.addEventListener('click', clearDataofClient);
