<?php
	class RequestData extends Data {
		
		public function __construct() {
			parent::__construct();
		}

		public function getAllBasket() {
			$arrayBasket = array();
			$sql = "SELECT * FROM basket ORDER BY value ASC;";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				foreach($result as $row) {
					$basket = new Basket();
					$basket->setIdBasket($row['id_basket']);
					$basket->setName($row['name']);
					$basket->setValue($row['value']);

					$idBasket = $basket->getIdBasket();
					$itemGroupArray = array();
					$sql_2 = "SELECT * FROM rel_basket_item WHERE id_basket = $idBasket;";
					$rs = $this->conn->query($sql_2);
					foreach($rs as $rw) {
						$itemGroupArray[$rw['item_group']] = $rw['quantity'];
					}
					$basket->setItemGroupArray($itemGroupArray);
					array_push($arrayBasket, $basket);
				}
				
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
			return $arrayBasket;
		}

		public function saveRequest($Request) {
			$idUser = $Request->getIdUser();
			$userName = $Request->getUserName();
			$userCpf = $Request->getUserCpf();
			$userAddress = $Request->getUserAddress();
			$userPhone = $Request->getUserPhone();
			$basket = $Request->getSelectedBasket();
			$items = $this->getArrayToString($Request->getSelectedItems());
			$foodRestriction = $this->getArrayToString($Request->getFoodRestriction());
			$status = $Request->getStatus();

			$sql = "INSERT INTO request(user_name, user_cpf, user_address, user_phone, id_user, id_items, id_basket, food_restriction, status) ";
			$sql .= "VALUES('$userName', '$userCpf', '$userAddress', '$userPhone', $idUser, '$items', $basket, '$foodRestriction', '$status')";
			$rs = $this->conn->query($sql);
			if(!is_null($rs)) {
				$this->returnAnswer = "Pedido realizado com sucesso!";
				$this->register = false;
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
		}

		private function getArrayToString($array) {
			$string = "";
			foreach($array as $value) {
				$string .= $value . "-";
			}
			return $string;
		}
	}
?>