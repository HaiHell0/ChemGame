<?php
require_once('../settings.php');

header('Content-Type: application/json; charset=utf-8');
require_once('GameItem.php');
$id;
if (isset($_SESSION["ADMIN_ID"]))
    $id = $_SESSION["ADMIN_ID"];
else
    $id = $_SESSION["USER_ID"];

$gameItem = new GameItem();
$result = $gameItem->addGame($id, $_POST['type'], "placeholder", $_POST['game_name'], $_POST['category']);
if ($result)
    echo json_encode(['message' => "Game has been added"]);
else
    echo json_encode(['message' => "Error:Game has not been added"]);



$gameTypeItem = new GameItem();
$gameTypeItem->addGame("2", "Test game ", "dirPhp", "dirCss", "dirJs");
?>