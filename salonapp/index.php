<?php

require_once "models/db.php";
require_once "models/model.php";
require_once "models/views.php";

$view = new view();



$view->show('header');
$view->show('body');
$view->show('footer');

?>
