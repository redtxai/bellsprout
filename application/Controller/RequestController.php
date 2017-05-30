<?php
	include("View/RequestView.php");
	include("Data/RequestData.php");
	include("Model/Basket.php");
	include("Model/Item.php");

	class RequestController {
		private $RequestView;
		private $RequestData;

		public function __construct() {
			$this->RequestView = new RequestView();
			$this->RequestData = new RequestData();
		}
		
		public function getBasketSelection() {
			$arratBasket = $this->RequestData->getAllBasket();
			$arrayItems = $this->RequestData->getAllItems();

			$returnContent = $this->RequestView->getBasketSelection($arratBasket);
			$returnContent .= $this->RequestView->getItemsSelection($arrayItems);
			return $returnContent;
		}
	}
?>