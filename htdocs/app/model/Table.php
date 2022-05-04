<?php
require_once 'DBAccessor.php';

class Table extends DBAccessor {

	public function getAllTables() {
		$query = $this->__getAllTablesQuery();
		$all_tables = $this->getDataFromDB($query);
		return $all_tables;
	}

	private function __getAllTablesQuery() {
		$query = 'SHOW TABLES';
		return $query;
	}

}