<?php
require_once '../dbConnect.php';
$variable = json_decode(file_get_contents('php://input'), true);
if (isset($variable)) {
    $jsonData = $variable['jsondata'];
    $userQuery = $db->prepare("SELECT * FROM clients_data WHERE id_of_client = :id");
    $userQuery->bindValue(':id', $jsonData['id'], PDO::PARAM_STR);
    $userQuery->execute();
    $user = $userQuery->fetchAll();
    echo json_encode($user);
}
?>