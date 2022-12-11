<?php
//signout
require_once('../settings.php');
if(count($_SESSION)>0 && (is_numeric($_SESSION['USER_ID'])||is_numeric($_SESSION['ADMIN_ID']))){
	$_SESSION=[];
	session_destroy();
}
header('location: index.php');
die();