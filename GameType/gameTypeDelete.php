<?php
require_once('../settings.php');


require_once('GameTypeItem.php');
$gameItem = new GameTypeItem();
$result = $gameItem->removeGameType($_POST['id']);
header('location: ../Views/admin.php');