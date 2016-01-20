<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>

	<body>
		<?php
			//ステップ1 db接続
			$dsn = 'mysql:dbname=phpkiso;host=localhost';
			//接続するためのユーザー情報
			$user = 'root';
			$password ='';
			//DB接続オブジェクトを作成
			$dbh = new PDO($dsn,$user,$password);
			//接続したオブジェクトで文字コードutf8を使うように指定
			$dbh -> query('SET NAMES utf8');


			$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$goiken = $_POST['goiken'];
			$nickname = htmlspecialchars($nickname);
			$email = htmlspecialchars($email);
			$goiken = htmlspecialchars($goiken);

			echo $nickname;
			echo '様';
			echo'ご意見ありがとうございました<br />';
			echo'頂いたご意見『';
			echo $goiken;
			echo'』<br />';
			echo $email;
			echo'にメールを送りましたでご確認ください。';

			//ステップ2　データベースエンジンにSQL文で司令を出す
			$sql = 'INSERT INTO `survey`( `nickname`, `email`, `goiken`) VALUES ("'.$nickname.'","'.$email.'","'.$goiken.'")';
			
			//var_dump($sql);
			$stmt = $dbh -> prepare($sql);

			//insert文を実行
			$stmt -> execute();

		//宿題 アンケートの一覧表示プログラミング

		// 	$dsn = 'mysql:dbname=phpkiso;host=localhost';
		// 	$user = 'root';
		// 	$password ='';
		// 	$dbh = new PDO($dsn,$user,$password);
		// 	$dbh -> query('SET NAMES utf8');

		// 	$sql = 'SELECT * FROM`survey` WHERE 1';;
		// 	$stmt = $dbh -> prepare($sql);
		// 	$stmt -> execute();


		// while(1)
		// {
		// 	$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
		// 	if($rec == false)
		// 	{
		// 		break;
		// 	}
		// 	echo $rec['nickname'];
		// 	echo $rec['email'];
		// 	echo $rec['goiken'];
		// 	echo '<br />';
		// }



			//データベースから切断
			$dbh = null;
		?>

	</body>
</html>
