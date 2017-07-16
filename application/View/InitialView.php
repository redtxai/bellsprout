<?php
	class InitialView {
		private $handle;
		private $fileContent;

		public function __construct($fileName) {
			$this->fileContent = file_get_contents("Initial/" . $fileName . ".html", FILE_USE_INCLUDE_PATH);
		}
		
		public function get() {
			return $this->fileContent;
		}
		
		public function setLogin($login) {
			$this->fileContent = str_replace("{LOGIN}", $login, $this->fileContent);
		}
		
		public function setBasketSelection($basketSelection) {
			$this->fileContent = str_replace("{BASKET_SELECTION}", $basketSelection, $this->fileContent);
		}
	}
?>