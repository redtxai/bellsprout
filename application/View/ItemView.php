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
	}
?>