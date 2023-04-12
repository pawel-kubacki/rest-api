<?php
function addClient($arg)
{
    require_once('functions.php');
    require_once('../dbConnect.php');
    $jsonData = $arg['jsondata'];

    checkIsData($jsonData);
    checkFirstnameAndSurname($jsonData);
    checkEmail($jsonData);
    checkIsAddEmail($db, $jsonData);
    $hash = checkPassword($jsonData);
    connectAndAdd($db, $jsonData, $hash);
    setcookie("add", "dodanie udane", time() + 60);
}
addClient(json_decode(file_get_contents('php://input'), true));
?>