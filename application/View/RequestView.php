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
			$ItemView = new ItemView();
			return $ItemView->getItemsSelection($arrayItems);
		}
	}
?>