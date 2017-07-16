<?php
	class ItemView {
		private $handle;
		private $fileContent;

		public function __construct() {}
		
		public function getFormNewItem() {
			return file_get_contents("Item/formNewItem.html", FILE_USE_INCLUDE_PATH);
		}
		
		public function get() {
			return $this->fileContent;
		}
		
		public function setBasketSelection($basketSelection) {
			$this->fileContent = str_replace("{BASKET_SELECTION}", $basketSelection, $this->fileContent);
		}

		public function getItemsSelection($arrayItems) {
			$fileContent = file_get_contents("Request/itemsSelection.html", FILE_USE_INCLUDE_PATH);
			$fileContent = str_replace("{ITEMS}", $this->getItemsContent($arrayItems), $fileContent);
			return $fileContent;
		}

		public function getItemsContent($arrayItems) {
			$currentItemGroup = $arrayItems[0]->getItemGroup();
			$itemsContent = "<fieldset><legend>$currentItemGroup</legend>";
			foreach($arrayItems as $item) {
				if (strcmp($item->getItemGroup(), $currentItemGroup) != 0) {
					$itemsContent .= "</fieldset>";
					$currentItemGroup = $item->getItemGroup();
					$itemsContent .= "<fieldset><legend>$currentItemGroup</legend>";
				}
				$itemsContent .= "<p>" . $item->getCheckbox() . "</p>";
			}
			$itemsContent .= "</fieldset>";
			return $itemsContent;
		}
	}
?>