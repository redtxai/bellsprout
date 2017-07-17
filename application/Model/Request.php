<?php
	class Request {
		private $idRequest = -1;
		private $idUser;
		private $userName;
		private $userCpf;
		private $userAddress;
		private $userPhone;
		private $selectedBasket;
		private $selectedItems;
		private $foodRestriction = Array();
		private $status;
		
		public function getIdRequest(){
			return $this->idRequest;
		}

		public function setIdRequest($idRequest){
			$this->idRequest = $idRequest;
		}

		public function getIdUser(){
			return $this->idUser;
		}

		public function setIdUser($idUser){
			$this->idUser = $idUser;
		}

		public function getUserName(){
			return $this->userName;
		}

		public function setUserName($userName){
			$this->userName = $userName;
		}

		public function getUserCpf(){
			return $this->userCpf;
		}

		public function setUserCpf($userCpf){
			$this->userCpf = $userCpf;
		}

		public function getUserAddress(){
			return $this->userAddress;
		}

		public function setUserAddress($userAddress){
			$this->userAddress = $userAddress;
		}

		public function getUserPhone(){
			return $this->userPhone;
		}

		public function setUserPhone($userPhone){
			$this->userPhone = $userPhone;
		}

		public function getSelectedBasket(){
			return $this->selectedBasket;
		}

		public function setSelectedBasket($selectedBasket){
			$this->selectedBasket = $selectedBasket;
		}

		public function getSelectedItems(){
			return $this->selectedItems;
		}

		public function setSelectedItems($selectedItems){
			$this->selectedItems = $selectedItems;
		}

		public function getFoodRestriction(){
			return $this->foodRestriction;
		}

		public function setFoodRestriction($foodRestriction){
			$this->foodRestriction = $foodRestriction;
		}

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($status){
			$this->status = $status;
		}
	}
?>