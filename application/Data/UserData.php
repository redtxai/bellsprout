<?php
	class UserData extends Data {
		private $idUser = 0;
		
		public function __construct() {
			parent::__construct();
		}
		
		public function tryRegister($username, $password, $permission) {
			$sql = "INSERT INTO user(username, password, permission) VALUES('$username', '$password', $permission);";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				$sql = "SELECT id_user FROM user WHERE username = '$username';";
				$result = $this->conn->query($sql);
				if (!is_null($result)) {
					foreach($result as $row) {
						$this->idUser = $row['id_user'];
					}
					$this->returnAnswer = "Usuário cadastrado com sucesso!";
					$this->register = true;
				}
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
		}
		
		public function tryRegisterUserDataModel($UserDataModel) {
			$name = $UserDataModel->getName();
			$cpf = $UserDataModel->getCpf();
			$address = $UserDataModel->getAddress();
			$phone = $UserDataModel->getPhone();
			$idUser = $UserDataModel->getIdUser();
			
			$sql = "INSERT INTO user_data(name, cpf, address, phone, id_user) VALUES('$name', '$cpf', '$address', '$phone', $idUser);";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				$this->returnAnswer = "Usuário cadastrado com sucesso!";
				$this->register = true;
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
		}
		
		public function getIdUser() {
			return $this->idUser;
		}
	}
?>