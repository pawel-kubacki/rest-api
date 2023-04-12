<?php
function editClient($arg)
{
    require_once('functions.php');
    require_once('../dbConnect.php');
    $jsonData = $arg['jsondata'];
    
    checkIsData($jsonData);
    checkFirstnameAndSurname($jsonData);
    checkEmail($jsonData);
    checkIsEditEmail($db, $jsonData);
    connectAndEdit($db, $jsonData);
    setcookie("edit", "edycja udana", time() + 60);
}
editClient(json_decode(file_get_contents('php://input'), true));
?>