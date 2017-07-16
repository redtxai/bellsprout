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

	}
?>