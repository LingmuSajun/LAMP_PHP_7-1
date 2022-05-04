◎ローカルからSSH接続
$ ssh LAMP_PHP_7-1

◎Lightsailのサーバー上

◼︎ディレクトリ移動
$ cd /home/bitnami/htdocs

◼︎クローン
$ git clone https://github.com/LingmuSajun/LAMP_PHP_7-1.git

◼︎phpdotenvインストール
$ composer require vlucas/phpdotenv

◼︎.env作成
$ vi .env

◼︎.env編集
DB_HOST = 'mysql:dbname=データベース名;host=ホスト名;charset=utf8'
DB_USER_NAME = 'ユーザー名'
DB_PASSWORD = 'パスワード'