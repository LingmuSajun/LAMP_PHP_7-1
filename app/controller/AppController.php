<?php
require_once '../../vendor/autoload.php';
require_once '../service/RequestService.php';
require_once '../service/ResponseService.php';

abstract class AppController {

	public function __construct() {
		// .env読み込み
		Dotenv\Dotenv::createImmutable('../../')->load();
		// リクエストサービスのインスタンス化
		$this->request_service = new RequestService();
		// レスポンスサービスのインスタンス化
		$this->response_service = new ResponseService();
		// execute()メソッド実行
		$this->execute();
	}

	abstract public function execute();
}