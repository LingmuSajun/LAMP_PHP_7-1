<?php
require_once 'DBAccessor.php';

class Field extends DBAccessor {

	public function getAllFieldsByTable(string $table): array {
		$query = $this->__getAllFieldsByTableQuery($table);
		$all_fields = $this->getDataFromDB($query);
		if(false === $all_fields) {
			return [];
		}
		return $all_fields;
	}

	private function __getAllFieldsByTableQuery(string $table): string {
		$query = "SELECT column_name ";
		$query .= "FROM ";
		$query .= "information_schema.columns ";
		$query .= "WHERE table_schema = 'pws' ";
		$query .= sprintf("AND table_name = '%s'", $table);
		return $query;
	}

}