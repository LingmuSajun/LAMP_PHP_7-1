<?php
require_once '../model/Field.php';

class FieldService {

	public function getAllFieldsByTable(string $table): array {
		$field_model = new Field();
		$all_fields = $field_model->getAllFieldsByTable($table);

		if(empty($all_fields)) {
			return [];
		}

		$formated_all_fields= [];

		foreach($all_fields as $field) {
			$field_name = $field['column_name'];
			$formated_all_fields[] = $field_name;
		}

		return $formated_all_fields;
	}

}