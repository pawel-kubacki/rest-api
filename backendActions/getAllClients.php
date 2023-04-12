<?php
class getAll
{
    public function show()
    {
        require_once '../dbConnect.php';
        $userQuery = $db->prepare("SELECT id, firstname, surname FROM clients");
        $userQuery->execute();
        $user = $userQuery->fetchAll();
        echo json_encode($user);
    }
}

$all = new getAll();
$all->show();
?>