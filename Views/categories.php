<?php
//in future will load a list with the category value from $_POST
require_once('../settings.php');

header('Content-Type: application/json; charset=utf-8');
echo json_decode(['message' => "Game has been added"]);