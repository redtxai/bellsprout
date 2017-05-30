<?php
	include("View/RequestView.php");
	include("Data/RequestData.php");
	include("Model/Item.php");

	class RequestController {
		private $RequestView;
		private $RequestData;

		public function __construct() {
			$this->RequestView = new RequestView();
			$this->RequestData = new RequestData();
		}
		
		public function getBasketSelection() {
			$arrayItems = $this->RequestData->getAllItems();
			return $this->RequestView->getBasketSelection($arrayItems);
		}
		
		public function makeRequest() {
			return "ok";
		}
	}
?>