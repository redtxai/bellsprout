<?php
	class RequestView {

		public function __construct() {}
		
		public function getBasketSelection($arrayItems) {
			$fileContent = file_get_contents("Request/basketSelection.html", FILE_USE_INCLUDE_PATH);
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