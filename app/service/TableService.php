<?php
require_once '../model/Table.php';

class TableService {

	public function getAllTables() {
		$table_model = new Table();
		$all_tables = $table_model->getAllTables();

		if(false === $all_tables) {
			return [];
		}

		$formated_all_tables = [];

		foreach($all_tables as $table) {
			$table_name = $table[0];
			$formated_all_tables[] = $table_name;
		}

		return $formated_all_tables;
	}

}