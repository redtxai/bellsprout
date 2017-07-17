<?php
	include("View/ItemView.php");
	include("View/LoginView.php");
	include("Data/LoginData.php");
	include("Model/UserDataModel.php");

	class LoginController {
		private $LoginView;
		private $LoginData;

		public function __construct($data = null) {
			$this->LoginView = new LoginView();
			if ($data != null && (!empty($data->user) && !empty($data->password))) {
				$this->tryLogin($data->user, $data->password);
			} else {
				if(!empty($_POST['login']) && !empty($_POST['password'])) {
					$this->tryLogin($_POST['password'], md5($_POST['password']));
				} elseif (!empty($_POST)) {
					$this->LoginView->errorLoginEmpty();
				} else {
					$this->LoginView->notLogged();
				}
			}
		}

		private function tryLogin($tryLogin, $tryPassword) {
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
					
					$data = Session::getInstance();
					$data->user = $tryLogin;
					$data->password = $tryPassword;
					$data->__set('idUser',$idUser);
					$data->name = $UserDataModel->getName();
					$data->cpf = $UserDataModel->getCpf();
					$data->address = $UserDataModel->getAddress();
					$data->phone = $UserDataModel->getPhone();
				}
			} else {
				$data = Session::getInstance();
				$data->destroy();
				$this->LoginView->notLogged();
			}
			$this->LoginData->destroy();
		}

		public function logout() {
			$data = Session::getInstance();
			$data->destroy();
			$this->LoginView->notLogged();
			return $this->show();
		}
		
		public function show() {
			return $this->LoginView->get();
		}
	}
?>