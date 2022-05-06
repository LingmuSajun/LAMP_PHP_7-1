<?php
require_once 'DBAccessor.php';

class Table extends DBAccessor {

	public function getAllTables(): array {
		$query = $this->__getAllTablesQuery();
		$all_tables = $this->getDataFromDB($query);
		if(false === $all_tables) {
			return [];
		}
		return $all_tables;
	}

	private function __getAllTablesQuery(): string {
		$query = 'SHOW TABLES';
		return $query;
	}

}