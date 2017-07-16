<?php
	include("Data/ItemData.php");
	include("View/ItemView.php");
	include("Model/Item.php");

	class ItemController {
		private $ItemData;
		private $ItemView;
		private $Item;

		public function __construct() {
			$this->ItemView = new ItemView();
			$this->ItemData = new ItemData();
		}

		public function register() {
			$this->fillItemModel();
			$this->ItemData->registerNewItem($this->Item);
			return $this->ItemData->get();
		}

		public function refreshItems() {
			$arrayItems = $this->ItemData->getAllItems();
			return $this->ItemView->getItemsContent($arrayItems);
		}

		private function fillItemModel() {
			$this->Item = new Item();
			$this->Item->setName($_POST['name']);
			$this->Item->setUnitName($_POST['unitName']);
			$this->Item->setUnitWeight($_POST['unitWeight']);
			$this->Item->setItemGroup($_POST['itemGroup']);
			if (isset($_POST['foodRestriction'])) {
				$this->Item->setFoodRestrictionArray($_POST['foodRestriction']);
			} else {
				$this->Item->setFoodRestrictionArray(Array());
			}
			$this->Item->setQuantity($_POST['quantity']);
		}
	}
?>