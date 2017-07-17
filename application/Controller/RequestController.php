<?php
	include_once("View/RequestView.php");
	include_once("Data/RequestData.php");
	include("Data/ItemData.php");
	include_once("Model/Request.php");
	include("Model/Basket.php");
	include("Model/Item.php");
	include_once("Model/UserDataModel.php");

	class RequestController {
		private $RequestView;
		private $RequestData;
		private $ItemData;

		public function __construct() {
			$this->RequestView = new RequestView();
			$this->RequestData = new RequestData();
			$this->ItemData = new ItemData();
		}

		public function getBasketSelection() {
			$arratBasket = $this->RequestData->getAllBasket();
			$arrayItems = $this->ItemData->getAllItems();

			$returnContent = $this->RequestView->getBasketSelection($arratBasket);
			$returnContent .= $this->RequestView->getItemsSelection($arrayItems);
			return $returnContent;
		}

		public function confirmationRequest() {
			$data = Session::getInstance();
			$UserData = new UserDataModel();
			$UserData->setIdUser($data->idUser);
			$UserData->setName($data->name);
			$UserData->setCpf($data->cpf);
			$UserData->setAddress($data->address);
			$UserData->setPhone($data->phone);

			$data->__set('selectedBasket', $_POST['basket']);
			$data->__set('selectedItems', $_POST['food']);
			if (isset($_POST['food_restriction'])) {
				$data->__set('foodRestriction', $_POST['food_restriction']);
			}
			return $this->RequestView->getConfirmationForm($UserData);
		}

		public function saveRequest() {
			$Request = new Request();
			$data = Session::getInstance();
			$Request->setIdUser($data->__get('idUser'));
			$Request->setUserName($_POST['name']);
			$Request->setUserCpf($_POST['cpf']);
			$Request->setUserAddress($_POST['address']);
			$Request->setUserPhone($_POST['phone']);
			$Request->setSelectedBasket($data->__get('selectedBasket'));
			$Request->setSelectedItems($data->__get('selectedItems'));
			if ($data->__isset('foodRestriction')) {
				$Request->setFoodRestriction($data->__get('foodRestriction'));
			}
			$Request->setStatus("Requisitado");

			$this->RequestData->saveRequest($Request);
			
			return $this->RequestData->get();
		}
	}
?>