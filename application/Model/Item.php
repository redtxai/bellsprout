<?php
	class Item {
		private $idItem;
		private $name;
		private $unitName;
		private $unitWeight;
		private $itemGroup;
		private $quantity;
		private $foodRestrictionArray = Array();

		public function getCheckbox() {
			$value = $this->getIdItem();
			$name = $this->getName();
			$itemGroup = $this->getItemGroup();
			$disabled = "";
			if ($this->quantity == 0) {
				$disabled = "disabled";
				$itemLabel = "<label for='$value' class='label-item'><strike>$name</strike></label>";
				$itemLabel .= "&nbsp;<strong>Esgotado</strong>";
			} else {
				$itemLabel = "<label for='$value' class='label-item'>$name</label>";
			}
			$rules = "<span class='item'>" . "<input type='hidden' id='restriction' name='$value' value='";
			foreach($this->foodRestrictionArray as $restriction) {
				$rules .= $restriction . "-";
			}
			$rules .= "'/>";
			return $rules . "<input type='checkbox' id='$value' name='food' group='$itemGroup' value='$value' $disabled>"
						  . $itemLabel;
		}

		public function getIdItem(){
			return $this->idItem;
		}

		public function setIdItem($idItem){
			$this->idItem = $idItem;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getUnitName(){
			return $this->unitName;
		}

		public function setUnitName($unitName){
			$this->unitName = $unitName;
		}

		public function getUnitWeight(){
			return $this->unitWeight;
		}

		public function setUnitWeight($unitWeight){
			$this->unitWeight = $unitWeight;
		}

		public function getItemGroup(){
			return $this->itemGroup;
		}

		public function setItemGroup($itemGroup){
			$this->itemGroup = $itemGroup;
		}

		public function getQuantity(){
			return $this->quantity;
		}

		public function setQuantity($quantity){
			$this->quantity = $quantity;
		}

		public function getFoodRestrictionArray() {
			return $this->foodRestrictionArray;
		}

		public function setFoodRestrictionArray($foodRestrictionArray) {
			$this->foodRestrictionArray = $foodRestrictionArray;
		}
	}

?>