<?php
class DBAccessor {

	public function getDataFromDB(string $query, array $bind_value_list = []) {
		try {
			$pdo = new PDO($_ENV['DB_HOST'], $_ENV['DB_USER_NAME'], $_ENV['DB_PASSWORD']);
			$stmt = $pdo->prepare($query);
			$stmt->execute($bind_value_list);
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			return false;
		}
	}
};