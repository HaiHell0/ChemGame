<?php
require_once('../settings.php');

header('Content-Type: application/json; charset=utf-8');
require_once('UserItem.php');
$adminItem = new UserItem();
$result = $adminItem->login($_POST['username'],$_POST['password']);
if ($result)echo json_encode(['message'=>"User successfully created"]);
else
    echo json_encode(['message'=>"User already exists"]);
?>