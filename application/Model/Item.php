<?php
	class Item {
		private $idItem;
		private $name;
		private $unitName;
		private $unitWeight;
		private $itemGroup;
		private $foodRestrictionArray = Array();

		public function getCheckbox() {
			$value = $this->getIdItem();
			$name = $this->getName();
			$itemGroup = $this->getItemGroup();
			$rules = "<span class='item'>" . "<input type='hidden' id='restriction' name='$value' value='";
			foreach($this->foodRestrictionArray as $restriction) {
				$rules .= $restriction . "-";
			}
			$rules .= "'/>";
			return $rules . "<input type='checkbox' id='$value' name='food' group='$itemGroup' value='$value'>"
						  . "<label for='$value' class='label-item'>$name</label>";
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

		public function getFoodRestrictionArray() {
			return $this->foodRestrictionArray;
		}

		public function setFoodRestrictionArray($foodRestrictionArray) {
			$this->foodRestrictionArray = $foodRestrictionArray;
		}
	}

?>