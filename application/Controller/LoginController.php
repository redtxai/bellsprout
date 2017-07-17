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
			if(!empty($_POST['login']) && !empty($_POST['password'])) {
				$this->tryLogin($_POST['password'], md5($_POST['password']));
				$this->loginFeature = $this->LoginView->get();
			} elseif($data != null && (!empty($data->user) && !empty($data->password))) {
				$this->tryLogin($data->user, $data->password);
				$this->loginFeature = $this->LoginView->get();
			} elseif(isset($_POST) || empty($_POST)) {
				$this->LoginView->notLogged();
				$this->logout();
			} else {
				$this->LoginView->errorLoginEmpty();
				$this->logout();
			}
		}

		private function tryLogin($tryLogin, $tryPassword) {
			$this->LoginData = new LoginData();
			if ($this->LoginData->isConnected()) {
				$this->LoginData->tryLogin($tryLogin, $tryPassword);
				$idUser = $this->LoginData->getIdUser();
				if ($idUser == 0) {
					$this->LoginView->errorloginWrong();
					$this->logout();
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
				}
			} else {
				$this->logout();
			}
			$this->LoginData->destroy();
		}

		public function logout() {
			$data = Session::getInstance();
			$data->destroy();
		}
		
		public function show() {
			return $this->LoginView->get();
		}
	}
?>