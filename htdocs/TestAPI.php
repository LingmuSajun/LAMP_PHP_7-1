<?php
// 連想配列用意
$country_list = [
    'asia' => [
        '日本',
        '中国',
        '韓国',
        'タイ',
		'ベトナム',
		'インド',
    ],
    'europe' => [
        'イギリス',
        'フランス',
        'ドイツ',
        'イタリア',
    ],
    'africa' => [
        'エジプト',
        '南アフリカ',
        'エチオピア',
        'タンザニア',
        'ナイジェリア',
        'ケニア',
    ]
];

header("Access-Control-Allow-Origin: *");

echo json_encode($country_list);