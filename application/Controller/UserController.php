<?php
	include_once("Data/UserData.php");
	include("Model/UserDataModel.php");

	class UserController {
		private $UserData;
		private $returnMessage;

		public function __construct() {
			$this->UserData = new UserData();
		}

		public function update() {
			$UserDataModel = new UserDataModel();
			$UserDataModel->setUserModelByPost($_POST);
			$UserDataModel->setIdUserData($_POST['id_user']);
			$this->UserData->updateUser($UserDataModel);
			return $this->UserData->get();
		}

		public function register() {
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
			return $this->returnMessage;
		}
	}
?>