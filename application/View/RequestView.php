<?php
	class RequestView {

		public function __construct() {}

		public function getBasketSelection($arrayBasket) {
			$fileContent = file_get_contents("Request/basketSelection.html", FILE_USE_INCLUDE_PATH);
			$basketContent = "";
			foreach($arrayBasket as $basket) {
				$basketContent .= "<p>" . $basket->getRadioButton() . "</p>";
			}
			$fileContent = str_replace("{BASKET}", $basketContent, $fileContent);

			return $fileContent;
		}

		public function getItemsSelection($arrayItems) {
			$fileContent = file_get_contents("Request/itemsSelection.html", FILE_USE_INCLUDE_PATH);
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
			$fileContent = str_replace("{ITEMS}", $itemsContent, $fileContent);
			
			return $fileContent;
		}
	}
?>