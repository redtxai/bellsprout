<?php
	include("View/LoginView.php");
	include("Data/LoginData.php");
	include("Model/UserDataModel.php");

	class LoginController {
		private $LoginView;
		private $LoginData;

		public function __construct() {
			$this->LoginView = new LoginView();
			if(!empty($_POST['login']) && !empty($_POST['password'])) {
				$tryLogin = $_POST['password'];
				$tryPassword = md5($_POST['password']);
				$this->LoginData = new LoginData();
				if ($this->LoginData->isConnected()) {
					$this->LoginData->tryLogin($tryLogin, $tryPassword);
					$idUser = $this->LoginData->getIdUser();
					if ($idUser == 0) {
						$this->LoginView->errorloginWrong();
					} else {
						$result = $this->LoginData->loadUserDataModel();
						$UserDataModel = new UserDataModel();
						if ($this->LoginData->getPermission() == 1) {
							$UserDataModel->setAdmin();
						}
						$UserDataModel->setUserModelByDatabaseResult($result);
						$UserDataModel->setIdUser($idUser);
						$this->LoginView->logged($UserDataModel);
					}
				}
				$this->LoginData->destroy();
			} else {
				$this->LoginView->errorLoginEmpty();
			}
		}
		
		public function show() {
			return $this->LoginView->get();
		}
	}
?>