<?php
	class UserDataModel {
		private $idUserData;
		private $name;
		private $cpf;
		private $address;
		private $phone;
		private $idUser;
		private $isAdmin = false;

		public function __construct() {}

		public function setUserModelByDatabaseResult($result) {
			foreach($result as $row) {
				$this->setIdUserData($row['id_user_data']);
				$this->setName($row['name']);
				$this->setCpf($row['cpf']);
				$this->setAddress($row['address']);
				$this->setPhone($row['phone']);
			}
		}
		public function setUserModelByPost($post) {
			$this->setName($post['name']);
			$this->setCpf($post['cpf']);
			$this->setAddress($post['address']);
			$this->setPhone($post['phone']);
		}
		
		public function getIdUserData(){
			return $this->idUserData;
		}

		public function setIdUserData($idUserData){
			$this->idUserData = $idUserData;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function getAddress(){
			return $this->address;
		}

		public function setAddress($address){
			$this->address = $address;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function setPhone($phone){
			$this->phone = $phone;
		}

		public function getIdUser(){
			return $this->idUser;
		}

		public function setIdUser($idUser){
			$this->idUser = $idUser;
		}

		public function isAdmin() {
			return $this->isAdmin;
		}

		public function setAdmin() {
			return $this->isAdmin = true;
		}
	}
?>