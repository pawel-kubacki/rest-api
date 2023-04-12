<?php
function deleteClient($arg)
{
    require_once('functions.php');
    require_once('../dbConnect.php');
    $jsonData = $arg['jsondata'];

    connectAndDelete($db, $jsonData);
    setcookie("delete", "usunięcie udane", time() + 60);
}
deleteClient(json_decode(file_get_contents('php://input'), true));
?>