<?php
require_once './DBAccessor.php';

class Table extends DBAccessor {

	public function getAllTables() {
		$query = __getAllTablesQuery();
		$this->getDataFromDB($query);
	}

	private function __getAllTablesQuery() {
		$query = 'SHOW TABLES';
		return $query;
	}

}