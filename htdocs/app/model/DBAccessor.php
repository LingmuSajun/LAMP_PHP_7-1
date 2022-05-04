<?php
class DBAccessor {

	private $db_host = '';
	private $db_user_name = '';
	private $db_password = '';

	public function __construct() {
		$this->$db_host = $_ENV['DB_HOST'];
		$this->$db_user_name = $_ENV['DB_USER_NAME'];
		$this->$db_password = $_ENV['DB_PASSWORD'];
	}

	public function getDataFromDB(string $query, array $bind_value_list = []) {
		try {
			$pdo = new PDO($this->$db_host, $this->$db_user_name, $this->$db_password);
			$stmt = $pdo->prepare($query);
			$stmt->execute($bind_value_list);
			$result = $stmt->fetch();
			return $result;
		} catch (PDOException $e) {
			return false;
		}
	}
}