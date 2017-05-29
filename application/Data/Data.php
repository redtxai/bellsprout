<?php
	class Data {
		protected $connection = false;
		protected $conn = null;
		
		public function __construct() {
			try {
				$this->conn = new PDO("mysql:host=localhost;dbname=bellsprout", "root", "");
				// set the PDO error mode to exception
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->connection = true; 
			}
			catch(PDOException $e) {
				$this->connection = false;
				$this->returnAnswer = "Connection failed: " . $e->getMessage();
			}
		}
		
		public function get() {
			return $this->returnAnswer;
		}
		
		public function isConnected() {
			return $this->connection;
		}
		
		public function destroy() {
			$this->connection = false;
			$this->conn = null;
		}
	}
?>