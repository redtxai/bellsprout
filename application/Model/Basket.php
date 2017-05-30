<?php
	class Basket {
		private $idBasket;
		private $name;
		private $value;
		private $itemGroupArray;

		public function getRadioButton() {
			$value = $this->getIdBasket();
			$name = $this->getName();
			return "<input type='radio' name='basket' value='$value'>$name";
		}

		public function getIdBasket(){
			return $this->idBasket;
		}

		public function setIdBasket($idBasket){
			$this->idBasket = $idBasket;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getValue(){
			return $this->value;
		}

		public function setValue($value){
			$this->value = $value;
		}

		public function getItemGroupArray(){
			return $this->itemGroupArray;
		}

		public function setItemGroupArray($itemGroupArray){
			$this->itemGroupArray = $itemGroupArray;
		}
	}

?>