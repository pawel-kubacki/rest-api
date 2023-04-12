<?php
function checkIsData($jsonData)
{
    if (!isset($jsonData)) {
        echo json_encode("Brak danych do edycjj.");
        exit();
    }
}

function checkFirstnameAndSurname($jsonData)
{
    // $pattern = "/A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ*/";
    $pattern = "/\W/";
    if (strlen($jsonData['firstname']) < 3) {
        echo json_encode("Imię musi posiadać minimum 3 znaki.");
        exit();
    }
    if (preg_match($pattern, $jsonData['firstname'])) {
        echo json_encode("Imię może posiadać tylko litery bez polskich znaków.");
        exit();
    }
    if (strlen($jsonData['surname']) < 3) {
        echo json_encode("Nazwisko musi posiadać minimum 3 znaki.");
        exit();
    }
    if (preg_match($pattern, $jsonData['surname'])) {
        echo json_encode("Nazwisko może posiadać tylko litery (dozwolone polskie znaki).");
        exit();
    }
}

function checkEmail($jsonData)
{
    $checkEmail = filter_var($jsonData['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($checkEmail, FILTER_VALIDATE_EMAIL) == false) {
        echo json_encode("Podaj poprawny adres e-mail!");
        exit();
    }
    if ($checkEmail != $jsonData['email']) {
        echo json_encode("Podaj poprawny adres e-mail!");
        exit();
    }
}

function checkIsEditEmail($db, $jsonData)
{
    $userQuery = $db->prepare('SELECT id, email FROM clients WHERE id != :id AND email = :email');
    $userQuery->bindValue(':id', $jsonData['id'], PDO::PARAM_STR);
    $userQuery->bindValue(':email', $jsonData['email'], PDO::PARAM_STR);
    $userQuery->execute();
    $isEmail = $userQuery->fetch();
    if (!empty($isEmail)) {
        echo json_encode("Istnieje już konto przypisane do tego adresu e-mail!");
        exit();
    }
}

function checkIsAddEmail($db, $jsonData)
{
    $userQuery = $db->prepare('SELECT email FROM clients WHERE email = :email');
    $userQuery->bindValue(':email', $jsonData['email'], PDO::PARAM_STR);
    $userQuery->execute();
    $isEmail = $userQuery->fetch();
    if (!empty($isEmail)) {
        echo json_encode("Istnieje już konto przypisane do tego adresu e-mail!");
        exit();
    }
}

function checkPassword($jsonData)
{
    if ((strlen($jsonData['password']) < 8) || (strlen($jsonData['password']) > 20)) {
        echo json_encode("Hasło musi posiadać od 8 do 20 znaków!");
        exit();
    }
    if ($jsonData['password'] != $jsonData['repeatPassword']) {
        echo json_encode("Podane hasła nie są identyczne!");
        exit();
    }
    if ($jsonData['password'] === $jsonData['repeatPassword']) {
        $password_hash = password_hash($jsonData['password'], PASSWORD_DEFAULT);
    }
    return $password_hash;
}

function connectAndEdit($db, $jsonData)
{
    $userQuery = $db->prepare('UPDATE clients SET firstname = :firstname, surname = :surname, email = :email WHERE id = :id');
    $userQuery->bindValue(':id', $jsonData['id'], PDO::PARAM_STR);
    $userQuery->bindValue(':firstname', $jsonData['firstname'], PDO::PARAM_STR);
    $userQuery->bindValue(':surname', $jsonData['surname'], PDO::PARAM_STR);
    $userQuery->bindValue(':email', $jsonData['email'], PDO::PARAM_STR);
    $userQuery->execute();
    echo json_encode("Dokonano edycji danych.");
}

function connectAndAdd($db, $jsonData, $password_hash)
{
    $userQuery = $db->prepare('INSERT INTO clients VALUES (NULL, :firstname, :surname, :email, :password, now())');
    $userQuery->bindValue(':firstname', $jsonData['firstname'], PDO::PARAM_STR);
    $userQuery->bindValue(':surname', $jsonData['surname'], PDO::PARAM_STR);
    $userQuery->bindValue(':email', $jsonData['email'], PDO::PARAM_STR);
    $userQuery->bindValue(':password', $password_hash, PDO::PARAM_STR);
    $userQuery->execute();
    echo json_encode("Dodano klienta do bazy.");
}

function connectAndDelete($db, $jsonData)
{
    $userQuery1 = $db->prepare("DELETE FROM clients WHERE id = :id");
    $userQuery1->bindValue(':id', $jsonData['id'], PDO::PARAM_STR);
    $userQuery2 = $db->prepare("DELETE FROM clients_data WHERE id_of_client = :id");
    $userQuery2->bindValue(':id', $jsonData['id'], PDO::PARAM_STR);
    $userQuery3 = $db->prepare("DELETE FROM used_cars WHERE id_of_client = :id");
    $userQuery3->bindValue(':id', $jsonData['id'], PDO::PARAM_STR);
    $userQuery1->execute();
    $userQuery2->execute();
    $userQuery3->execute();
    echo json_encode("Pomyślnie usunięto klienta.");
}
?>