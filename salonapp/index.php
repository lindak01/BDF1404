<?php

require_once "models/db.php";
require_once "models/model.php";
require_once "models/views.php"; 


$view = new view();
$stylists = new model();



$view->show('header');

if(!empty($_GET["action"])){
	if($_GET["action"]=="stylist"){
		
		$view->show('stylists');
		
	}if($_GET["action"]=="client"){
		
		//$results = $stylists->getStylists();
		$view->show('clients');
		//function getStylists() wouldn't execute query
		$connect = mysqli_connect($host,$user,$password,$database)
			or die ("Couldn't connect to server.");
        
		$query = "SELECT * FROM stylist";
		$result = mysqli_query($connect, $query)
			or die ("Couldn't execute query.");

		while($row = mysqli_fetch_assoc($result))
		{
			extract($row);
			echo "<a href='views/details.php'><p id='stylists'>$fname $lname</p></a>";
		}
		
		if($_GET["action"]=="details"){
				
				$result = $stylists->getOne($_GET["id"]);
				$view->show('details');
			}
	}
	
}else{
	$view->show('body');
}

$view->show('footer');

?>
