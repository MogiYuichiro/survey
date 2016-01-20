
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>

	<body>
		<?php

			//宿題 アンケートの一覧表示プログラミング

			//データベースに接続
			$dsn = 'mysql:dbname=phpkiso;host=localhost'; //←ローカルホストのphpkisoに
			$user = 'root'; //←「root」権限で
			$password ='';
			$dbh = new PDO($dsn,$user,$password); //←データベースに接続
			$dbh->query('SET NAMES utf8'); //←命令内容記述。query('命令実行するSQL文');

			//司令 データを全部くださいというSQL文！
			$sql = 'SELECT * FROM survey WHERE 1'; //←「enquete」から全部。
			$stmt = $dbh->prepare($sql);//←「SQL文」で命令を出す準備。
			$stmt -> execute(); //←データベースに「SQL文」を送信。「$stmt」に結果が返る
        



			while(1) //←無限ループ
			{
			$rec = $stmt -> fetch(PDO::FETCH_ASSOC); //←順番に1レコード取り出す命令
			if($rec == false) //←取り出すレコードが「無くなったら」
			{
				break; //←このループから脱出
			}
			echo $rec ['code'];
			echo $rec['nickname'];
			echo $rec['email'];
			echo $rec['goiken'];
			echo '<br />';
			}

			//データベースから切断
			$dbh = null;
		?>
	</body>
</html>

