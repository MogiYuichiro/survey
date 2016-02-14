<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>

	<body>
		<?php

			//
			$code = $_POST['code'];
			try
			{
			//データベースに接続
			$dsn = 'mysql:dbname=phpkiso;host=localhost'; //←ローカルホストのphpkisoに
			$user = 'root'; //←「root」権限で
			$password ='';
			$dbh = new PDO($dsn,$user,$password); //←データベースに接続
			$dbh->query('SET NAMES utf8'); //←命令内容記述。query('命令実行するSQL文');

			//司令 データを全部くださいというSQL文！
			$sql = 'SELECT * FROM `survey` WHERE `code` = ?'; //←データ
			$stmt = $dbh->prepare($sql);//←「SQL文」で命令を出す準備。
			$data[]=$code;
			$stmt -> execute($data);//←データベースに「SQL文」を送信。「$stmt」に結果が返る
        

			
			$rec = $stmt -> fetch(PDO::FETCH_ASSOC); //←順番に1レコード取り出す命令
			if($rec == false) {
				echo '検索結果がありません';
			}else{
			echo $rec['code'];
			echo $rec['nickname'];
			echo $rec['email'];
			echo $rec['goiken'];
			echo '<br />';
			}

			//データベースから切断
			$dbh = null;
			}
			catch
		?>
	</body>
</html>

