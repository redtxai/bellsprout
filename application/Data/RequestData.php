<?php
	include_once("Model/Request.php");

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
			$items = implode($Request->getSelectedItems(), ",");
			$foodRestriction = implode($Request->getFoodRestriction(), ",");
			$status = $Request->getStatus();

			$sql = "INSERT INTO request(user_name, user_cpf, user_address, user_phone, id_user, id_items, id_basket, food_restriction, status) ";
			$sql .= "VALUES('$userName', '$userCpf', '$userAddress', '$userPhone', $idUser, '$items', $basket, '$foodRestriction', '$status')";
			$rs = $this->conn->query($sql);
			if(!is_null($rs)) {
				$this->returnAnswer = "Pedido realizado com sucesso!";
				$this->register = true;
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
		}

		public function getRequestArray($idUser) {
			$requestArray = Array();
			$sql = "SELECT * FROM request WHERE id_user = $idUser";
			$rs = $this->conn->query($sql);
			if(!is_null($rs)) {
				$this->register = false;
				foreach($rs as $row) {
					$Request = new Request();
					$Request->setIdRequest($row['id_request']);
					$Request->setIdUser($row['id_user']);
					$Request->setUserName($row['user_name']);
					$Request->setUserCpf($row['user_cpf']);
					$Request->setUserAddress($row['user_address']);
					$Request->setUserPhone($row['user_phone']);
					$Request->setSelectedBasket($row['id_basket']);
					$Request->setSelectedItems(explode(",", $row['id_items']));
					$Request->setFoodRestriction(explode(",", $row['food_restriction']));
					$Request->setStatus($row['status']);
					array_push($requestArray, $Request);
				}
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
			return $requestArray;
		}
	}
?>