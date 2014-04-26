<?php

require_once "models/db.php";
require_once "models/model.php";
require_once "models/views.php";

$view = new view();
$stylists = new model();



$view->show('header.inc');

if(!empty($_GET["action"])){
	if($_GET["action"]=="stylist"){
		
		$results = $stylists->getStylists();
		$view->show('stylists');
		
	}if($_GET["action"]=="client"){
		
		$view->show('clients.inc');
	}
	
}else{
	$view->show('body.inc');
}

$view->show('footer.inc');

?>
