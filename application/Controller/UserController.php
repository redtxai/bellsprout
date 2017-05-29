<?php
	include("Model/UserDataModel.php");

	class UserController {
		private $UserData;
		private $returnMessage;

		public function __construct() {
			$this->UserData = new UserData();
			if ($this->UserData->isConnected()) {
				
				if (!empty($_POST['login']) && !empty($_POST['password'])) {
					$this->UserData->tryRegister($_POST['login'], md5($_POST['password']), $_POST['permission']);
					$idUser = $this->UserData->getIdUser();
					if ($idUser != 0) {
						$UserDataModel = new UserDataModel();
						$UserDataModel->setUserModelByPost($_POST);
						$UserDataModel->setIdUser($idUser);
						if ($_POST['permission'] == 1) {
							$UserDataModel->setAdmin();
						}
						$this->UserData->tryRegisterUserDataModel($UserDataModel);
					}
					$this->returnMessage = $this->UserData->get();
				} else {
					$this->returnMessage = "Login e senha vazios";
				}
				
				$this->UserData->destroy();
			} else {
				$this->returnMessage = "Ocorreu um problema!";
			}
			$this->UserData->destroy();
		}
		
		public function register() {
			return $this->returnMessage;
		}
	}
?>