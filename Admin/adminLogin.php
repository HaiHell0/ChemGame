<?php
require_once('../settings.php');

header('Content-Type: application/json; charset=utf-8');
require_once('AdminItem.php');
$adminItem = new AdminItem();
$result = $adminItem->signin($_POST['username'],$_POST['password']);
if ($result){


echo json_encode(['message'=>"User logged in"]);
}
else
    echo json_encode(['message'=>"User log in fail"]);
?>