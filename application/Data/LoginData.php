<?php
	class LoginData extends Data {
		private $idUser = 0;
		private $permission = 0;
		private $UserDataModel;
		
		public function __construct() {
			parent::__construct();
		}
		
		public function tryLogin($tryLogin, $tryPassword) {
			$sql = "SELECT id_user, username, permission FROM user WHERE username = '$tryLogin' AND password = '$tryPassword';";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				foreach($result as $row) {
					$this->idUser = $row['id_user'];
					$this->permission = $row['permission'];
				}
			} else {
				$this->idUser = 0;
				$this->permission = 0;
				$this->returnAnswer = "Login wrong";
			}
		}
		
		public function getIdUser() {
			return $this->idUser;
		}
		
		public function getPermission() {
			return $this->permission;
		}
		
		public function loadUserDataModel() {
			$sql = "SELECT * FROM user_data WHERE id_user = '$this->idUser';";
			$result = $this->conn->query($sql);
			if (is_null($result)) {
				$this->destroy();
				$this->returnAnswer = "Connection problem";
			}
			return $result;
		}
	}
?>