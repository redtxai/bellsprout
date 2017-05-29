<?php
	$obj = "Initial";
	$mth = "show";
	if(!empty($_GET['obj'])) {
		$obj = $_GET['obj'];
		if (!empty($_GET['mth'])) {
			$mth = $_GET['mth'];
		}
	}
	
	if (file_exists("Controller/" . $obj . "Controller.php")) {
		include("Controller/" . $obj . "Controller.php");
	}
	if (file_exists("Model/" . $obj . ".php")) {
		include("Model/" . $obj . ".php");
	}
	if (file_exists("View/" . $obj . "View.php")) {
		include("View/" . $obj . "View.php");
	}

	include("Data/Data.php");
	if (file_exists("Data/" . $obj . "Data.php")) {
		include("Data/" . $obj . "Data.php");
	}
	
	$obj .= "Controller";
	$actionClass = new $obj;
	echo $actionClass->$mth();
	
?>