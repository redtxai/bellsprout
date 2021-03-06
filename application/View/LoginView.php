<?php
	class LoginView {
		private $handle;
		private $fileContent;
		private $UserData;
		private $requestListHtml;

		public function __construct() {}

		public function logged($UserData) {
			$this->fileContent = file_get_contents("Login/login.html", FILE_USE_INCLUDE_PATH);
			$this->setUserData($UserData);
			
			$this->fileContent = str_replace("{REQUEST_LIST}", $this->requestListHtml, $this->fileContent);
			if ($UserData->isAdmin()) {
				$this->fileContent = str_replace("{FORM_NEW_USER}", $this->getFormNewUser(), $this->fileContent);
				$ItemView = new ItemView();
				$this->fileContent = str_replace("{FORM_NEW_ITEM}", $ItemView->getFormNewItem(), $this->fileContent);
			} else {
				$this->fileContent = str_replace("{FORM_NEW_USER}", "", $this->fileContent);
				$this->fileContent = str_replace("{FORM_NEW_ITEM}", "", $this->fileContent);
			}
		}

		public function notLogged() {
			$this->fileContent = file_get_contents("Login/notLogged.html", FILE_USE_INCLUDE_PATH);
		}

		public function get() {
			return $this->fileContent;
		}

		public function errorLoginEmpty() {
			$this->fileContent = file_get_contents("Login/errorLoginEmpty.html", FILE_USE_INCLUDE_PATH);
		}

		public function errorloginWrong() {
			$this->fileContent = file_get_contents("Login/errorloginWrong.html", FILE_USE_INCLUDE_PATH);
		}

		public function setRequestListHtml($requestListHtml) {
			$this->requestListHtml = $requestListHtml;
		}

		private function setUserData($UserData) {
			$this->fileContent = str_replace("{ID_USER}", $UserData->getIdUserData(), $this->fileContent);
			$this->fileContent = str_replace("{NAME}", $UserData->getName(), $this->fileContent);
			$this->fileContent = str_replace("{CPF}", $UserData->getCpf(), $this->fileContent);
			$this->fileContent = str_replace("{ADDRESS}", $UserData->getAddress(), $this->fileContent);
			$this->fileContent = str_replace("{PHONE}", $UserData->getPhone(), $this->fileContent);
		}

		private function getFormNewUser() {
			return file_get_contents("Login/formNewUser.html", FILE_USE_INCLUDE_PATH);
		}
	}
?>