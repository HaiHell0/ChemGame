<?php
require_once('../settings.php');


require_once('GameItem.php');
$gameItem = new GameItem();
$result = $gameItem->removeGame($_POST['id']);
header('location: ../Views/user.php');