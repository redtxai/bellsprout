<?php
	class ItemData extends Data {
		public function __construct() {
			parent::__construct();
		}

		public function registerNewItem($Item) {
			$name = $Item->getName();
			$unitName = $Item->getUnitName();
			$unitWeight = $Item->getUnitWeight();
			$itemGroup = $Item->getItemGroup();
			$quantity = $Item->getQuantity();
			$foodRestrictionArray = $Item->getFoodRestrictionArray();
			
			$sql = "INSERT INTO item(name, unit_name, unit_weight, item_group, quantity) VALUES('$name', '$unitName', $unitWeight, '$itemGroup', $quantity);";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				$this->returnAnswer = "Item cadastrado com sucesso!";
				$this->register = true;
				$sql = "SELECT id_item FROM item WHERE name = '$name' AND unit_name = '$unitName' AND unit_weight = $unitWeight AND item_group = '$itemGroup';";
				$result = $this->conn->query($sql);
				if (!is_null($result)) {
					foreach($result as $row) {
						$idItem = $row['id_item'];
					}
					$sql = "";
					foreach($foodRestrictionArray as $restriction) {
						$sql .= "INSERT INTO rel_item_food_restriction(food_restriction, id_item) VALUES('$restriction', $idItem);";
					}
					$result = $this->conn->query($sql);
					if (!is_null($result)) {
						
					} else {
						$this->returnAnswer = "Ocorreu um erro!";
						$this->register = false;
					}
				} else {
					$this->returnAnswer = "Ocorreu um erro!";
					$this->register = false;
				}
			} else {
				$this->returnAnswer = "Ocorreu um erro!";
				$this->register = false;
			}
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
					$item->setQuantity($row['quantity']);
					
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