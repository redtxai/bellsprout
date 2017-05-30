<?php
	$obj = "Initial";
	$mth = "show";
	if(!empty($_GET['obj'])) {
		$obj = $_GET['obj'];
		if (!empty($_GET['mth'])) {
			$mth = $_GET['mth'];
		}
	}
	include("Data/Data.php");
	
	if (file_exists("Controller/" . $obj . "Controller.php")) {
		include("Controller/" . $obj . "Controller.php");
	}

	$obj .= "Controller";
	$actionClass = new $obj;
	echo $actionClass->$mth();
?>