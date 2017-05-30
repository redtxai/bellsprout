<?php
	class RequestData extends Data {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function getAllItems() {
			$arrayItems = array();
			$sql = "SELECT * FROM item ORDER BY item_group;";
			$result = $this->conn->query($sql);
			if (!is_null($result)) {
				foreach($result as $row) {
					$item = new Item();
					$item->setIdItem($row['id_item']);
					$item->setname($row['name']);
					$item->setUnitName($row['unit_name']);
					$item->setUnitWeight($row['unit_weight']);
					$item->setItemGroup($row['item_group']);
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