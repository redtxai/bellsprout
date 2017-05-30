<?php
	include("Controller/RequestController.php");
	include("View/InitialView.php");

	class InitialController {
		private $InitialView;
		private $initialViewHtml = "initial";

		public function __construct() {
			$this->InitialView = new InitialView($this->initialViewHtml);
			$RequestController = new RequestController();
			$this->InitialView->setBasketSelection($RequestController->getBasketSelection());
		}
		
		public function show() {
			return $this->InitialView->get();
		}
	}
?>