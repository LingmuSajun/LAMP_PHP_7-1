<?php
require_once 'TableService.php';
require_once 'FieldService.php';
require_once 'ConditionService.php';
require_once 'OrderService.php';

class RequestService {

	private $request_params = [];
	private $table_service;
	private $field_service;
	private $condition_service;
	private $order_service;

	public function __construct() {
		$this->table_service = new TableService();
		$this->field_service = new FieldService();
		// $this->condition_service = new ConditionService();
		// $this->order_service = new OrderService();
	}

	public function getRequestParams() {

		$table = $this->__checkAndFormatTableParam();
		if($table === '') {
			return false;
		}

		$available_fields = $this->field_service->getAllFieldsByTable($table);
		if(empty($available_fields)) {
			return false;
		}

		$field = $this->__checkAndFormatFieldParam($available_fields);
		if($field === '') {
			return false;
		}

		if(isset($_GET['condition']) && !empty($_GET['condition'])) {
			$request_params['condition'] = $_GET['condition'];
		}

		if(isset($_GET['order']) && !empty($_GET['order'])) {
			$request_params['order'] = $_GET['order'];
		}

		$request_params['table'] = $table;
		$request_params['field'] = $field;
		$request_params['condition'] = $_GET['condition'];
		$request_params['order'] = $_GET['order'];
		return $request_params;
	}

	private function __checkAndFormatTableParam(): string {
		$table = '';

		if(!isset($_GET['table']) || empty($_GET['table'])) {
			return $table;
		}

		$available_tables = $this->table_service->getAllTables();

		if(!in_array($_GET['table'], $available_tables, true)) {
			return $table;
		}

		$table = $_GET['table'];
		return $table;
	}

	private function __checkAndFormatFieldParam(array $available_fields): string {
		$str_fields = '';

		if(!isset($_GET['field']) || empty($_GET['field'])) {
			return $str_fields;
		}

		$arr_request_fields = explode(",", $_GET['field']);

		foreach($arr_request_fields as $arr_request_field) {
			if(!in_array($arr_request_field, $available_fields, true)) {
				return $str_fields;
			}
		}

		$str_fields = $_GET['field'];
		return $str_fields;
	}

	private function __checkAndFormatConditionParam(array $available_fields): array {
		$condition_fields = [];
	}

}