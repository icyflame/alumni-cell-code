<?php

if(!empty($_POST)){

	echo $_POST['un'].'<br/>';
	echo $_POST['pw'].'<br/>';
	echo $_POST['fn'].'<br/>';
	echo $_POST['ln'].'<br/>';

	$host = 'localhost';

	$name = 'sid';

	$pass = '';

	$dbname = 'adatabase';

	if(mysql_connect($host, $name, $pass)){

		echo 'connected to server<br/>';

		if(mysql_select_db($dbname)){

			echo 'connected to database<br/>';

			if(isset($_POST['un']) && isset($_POST['pw']) && isset($_POST['fn']) && isset($_POST['ln'])){

				$user = "'".$_POST['un']."'";
				$pass = "'".md5($_POST['pw'])."'";
				$firs = "'".$_POST['fn']."'";
				$last = "'".$_POST['ln']."'";

				$query = "INSERT INTO `users` VALUES (".$user.','.$pass.','.$firs.','.$last.')';

		// $query = "INSERT INTO users VALUES (".$_POST['un'].')';

				echo $query.'<br/>';

				if(mysql_query($query)){
					echo "Successfully added to database.";
				}

				else{
					echo mysql_error();
				}

			}

		}

	}

}

?>

<html>

<body>

	<form action="registration-form.php" method="POST">

		username:<input type="text" name="un"/><br/>
		password:<input type="password" name="pw"/><br/>
		firstname:<input type="text" name="fn"/><br/>
		lastname:<input type="text" name="ln"/><br/>

		<input type="submit" value="register">

	</form>

</body>

</html>