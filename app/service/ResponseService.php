<?php
class ResponseService {

	private $response_message_list = [
		100 => 'パラメータの設定に問題があります。',
		400 => 'サーバー内部でエラーが発生しました。',
		200 => '正常に取得しました。',
	];

	public function getErrorResponse(int $response_code): array {
		$response = [];
		$response['code'] = $response_code;
		$response['message'] = $this->response_message_list[$response_code];
		$response = $this->__convertArrayToJsonString($response);
		return $response;
	}

	public function getSuccessResponse(array $item_list): array {
		$response = [];
		$response['code'] = 200;
		$response['message'] = $this->response_message_list[200];
		$response['item_list'] = $item_list;
		$response = $this->__convertArrayToJsonString($response);
		return $response;
	}

	private function __convertArrayToJsonString(array $array): string {
		header("Access-Control-Allow-Origin: *");
		$json_string = json_encode($array);
		return $json_string;
	}

}