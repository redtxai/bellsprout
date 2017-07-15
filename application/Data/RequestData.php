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

		public function getAllItems() {
			$arrayItems = array();
			$sql = "SELECT * FROM item ORDER BY item_group;";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				foreach($result as $row) {
					$item = new Item();
					$item->setIdItem($row['id_item']);
					$item->setName($row['name']);
					$item->setUnitName($row['unit_name']);
					$item->setUnitWeight($row['unit_weight']);
					$item->setItemGroup($row['item_group']);
					
					$idItem = $item->getIdItem();
					$foodRestrictionArray = array();
					$sql_2 = "SELECT * FROM rel_item_food_restriction WHERE id_item = $idItem;";
					$rs = $this->conn->query($sql_2);
					foreach($rs as $rw) {
						array_push($foodRestrictionArray, $rw['food_restriction']);
					}
					$item->setFoodRestrictionArray($foodRestrictionArray);
					
					array_push($arrayItems, $item);
				}
				
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
			return $arrayItems;
		}

	}
?>