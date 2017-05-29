<?php
	class InitialView {
		private $handle;
		private $fileName;

		public function __construct($fileName) {
			$this->fileName = "Initial/" . $fileName . ".html";
		}
		
		public function get() {
			$fileContent = file_get_contents($this->fileName, FILE_USE_INCLUDE_PATH);
			return $fileContent;
		}
	}
?>