<?php
	include("Data/ItemData.php");
	include("Model/Item.php");

	class ItemController {
		private $ItemData;
		private $Item;

		public function __construct() {
			$this->ItemData = new ItemData();
			$this->fillItemModel();
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
		
		public function register() {
			$this->ItemData->registerNewItem($this->Item);
			return $this->ItemData->get();
		}
	}
?>