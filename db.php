<?php

session_start();

// if(!empty($_POST)){

	// echo $_POST['un'].'<br/>';
	// echo $_POST['pw'].'<br/>';

$host = 'localhost';

$name = 'sid';

$pass = '';

$dbname = 'adatabase';

if(mysql_connect($host, $name, $pass)){

	echo 'connected to server<br/>';

	if(mysql_select_db($dbname)){

		echo 'connected to database<br/>';

		if($_SESSION['loggedin'])

			echo 'User is logged in.';

		else

			echo 'User not logged in.';

			// if(isset($_POST['un']) && isset($_POST['pw'])){

			// 	$user = "'".$_POST['un']."'";
			// 	$pass = "'".md5($_POST['pw'])."'";

			// 	$query = "SELECT `password` FROM `users` WHERE username=".$user;

			// 	echo $query.'<br/>';

			// 	$res = mysql_query($query);

			// 	$resrow = mysql_fetch_assoc($res);

			// 	$pass_entered = md5($_POST['pw']);

			// 	$pass_stored = $resrow['password'];

			// 	echo 'Pass stored: '.$pass_stored.'<br/>';
			// 	echo 'Pass entered: '.$pass_entered.'<br/>';

			// 	if($pass_stored == $pass_entered)

			// 		echo 'Login Confirmed';

			// 	else

			// 		echo 'Bad Password';

			// }

	}

}

// }

?>

<html>

<body>

	<!-- <form action="" method="POST">

		username:<input type="text" name="un"/><br/>
		password:<input type="password" name="pw"/><br/>

		<input type="submit" value="register">

	</form> -->

</body>

</html>