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
	}
?>