<?php
require_once './AppController.php';

class GetDataFromDB extends AppController {

	public function execute() {
		$response = [];

		// リクエストパラメータ取得
		$request_params = $this->request_service->getRequestParams();
		var_dump('$request_params');
		var_dump($request_params);

		if(false === $request_params) {
			$response = $this->response_service->getErrorResponse(100);
			echo $response;
			exit;
		}

		var_dump('ccc');

		// $table = $_GET['table'];
		// $country_service = new CountryService();
	}
} new GetDataFromDB();