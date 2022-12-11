<?php
require_once('../settings.php');

header('Content-Type: application/json; charset=utf-8');
require_once('AdminItem.php');
$adminItem = new AdminItem();
$result = $adminItem->addAdmin($_POST['username'],$_POST['password']);
if ($result)echo json_encode(['message'=>"User successfully created"]);
else
    echo json_encode(['message'=>"User already exists"]);
?>