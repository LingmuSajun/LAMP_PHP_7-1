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
		// $this->field_service = new FieldService();
		// $this->condition_service = new ConditionService();
		// $this->order_service = new OrderService();
	}

	public function getRequestParams() {

		$table = $this->__getAndCheckTableParam();
		if($table === '') {
			return false;
		}

		if(!isset($_GET['field']) || empty($_GET['field'])) {
			return false;
		}

		$request_params['field'] = $_GET['field'];

		if(isset($_GET['condition']) && !empty($_GET['condition'])) {
			$request_params['condition'] = $_GET['condition'];
		}

		if(isset($_GET['order']) && !empty($_GET['order'])) {
			$request_params['order'] = $_GET['order'];
		}

		$request_params['table'] = $table;
		$request_params['field'] = $_GET['field'];
		$request_params['condition'] = $_GET['condition'];
		$request_params['order'] = $_GET['order'];
		return $request_params;
	}

	private function __getAndCheckTableParam() {
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

}