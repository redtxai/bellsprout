<?php
	class InitialController {
		private $InitialView;
		private $initialViewHtml = "initial";

		public function __construct() {
			$this->InitialView = new InitialView($this->initialViewHtml);
		}
		
		public function show() {
			return $this->InitialView->get();
		}
	}
?>