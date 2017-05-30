<?php
	class Item {
		private $idItem;
		private $name;
		private $unitName;
		private $unitWeight;
		private $itemGroup;

		public function getCheckbox() {
			$value = $this->getIdItem();
			$name = $this->getName();
			return "<input type='checkbox' name='food' value='$value'>$name";
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
	}

?>