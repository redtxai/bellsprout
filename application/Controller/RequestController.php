<?php
	include("View/RequestView.php");
	include("Data/RequestData.php");
	include("Data/ItemData.php");
	include("Model/Basket.php");
	include("Model/Item.php");

	class RequestController {
		private $RequestView;
		private $RequestData;
		private $ItemData;

		public function __construct() {
			$this->RequestView = new RequestView();
			$this->RequestData = new RequestData();
			$this->ItemData = new ItemData();
		}

		public function getBasketSelection() {
			$arratBasket = $this->RequestData->getAllBasket();
			$arrayItems = $this->ItemData->getAllItems();

			$returnContent = $this->RequestView->getBasketSelection($arratBasket);
			$returnContent .= $this->RequestView->getItemsSelection($arrayItems);
			return $returnContent;
		}

		public function confirmationRequest() {
			
		}
	}
?>