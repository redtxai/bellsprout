<?php
	include_once("View/ItemView.php");

	class RequestView {

		public function __construct() {}

		public function getBasketSelection($arrayBasket) {
			$fileContent = file_get_contents("Request/basketSelection.html", FILE_USE_INCLUDE_PATH);
			$basketContent = "";
			foreach($arrayBasket as $basket) {
				$basketContent .= "<p>" . $basket->getRadioButton() . "</p>";
			}
			$fileContent = str_replace("{BASKET}", $basketContent, $fileContent);

			return $fileContent;
		}

		public function getItemsSelection($arrayItems) {
			$ItemView = new ItemView();
			return $ItemView->getItemsSelection($arrayItems);
		}

		public function getConfirmationForm($User) {
			$fileContent = file_get_contents("Request/confirmationForm.html", FILE_USE_INCLUDE_PATH);
			$fileContent = str_replace("{NAME}", $User->getName(), $fileContent);
			$fileContent = str_replace("{CPF}", $User->getCpf(), $fileContent);
			$fileContent = str_replace("{ADDRESS}", $User->getAddress(), $fileContent);
			$fileContent = str_replace("{PHONE}", $User->getPhone(), $fileContent);
			return $fileContent;
		}

		public function getRequestListHtml($requestArray) {
			$requestList = "";
			foreach($requestArray as $request) {
				$fileContent = file_get_contents("Request/userRequest.html", FILE_USE_INCLUDE_PATH);
				$fileContent = str_replace("{ID_REQUEST}", $request->getIdRequest(), $fileContent);
				$fileContent = str_replace("{USER_NAME}", $request->getUserName(), $fileContent);
				$fileContent = str_replace("{USER_CPF}", $request->getUserCpf(), $fileContent);
				$fileContent = str_replace("{USER_ADDRESS}", $request->getUserAddress(), $fileContent);
				$fileContent = str_replace("{USER_PHONE}", $request->getUserPhone(), $fileContent);
				$fileContent = str_replace("{BASKET}", $request->getSelectedBasket(), $fileContent);
				$fileContent = str_replace("{ITEMS}", implode($request->getSelectedItems(), ","), $fileContent);
				$fileContent = str_replace("{STATUS}", $request->getStatus(), $fileContent);
				$requestList .= $fileContent . "<hr/>";
			}
			$fileContent = file_get_contents("Request/userRequestList.html", FILE_USE_INCLUDE_PATH);
			$fileContent = str_replace("{REQUEST_LIST}", $requestList, $fileContent);
			return $fileContent;
		}
	}
?>