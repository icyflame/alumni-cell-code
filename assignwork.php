<?php
session_start();

require 'connect.php';

// connected to database

// name of the table is tasks

if(!empty($_POST)){

	if(isset($_POST['desc']) && isset($_POST['dl']) && isset($_POST['assignee'])){

		echo $_POST['desc'].'<br/>';
		echo $_POST['dl'].'<br/>';
		echo $_POST['assignee'].'<br/>';

		$desc = "'".$_POST['desc']."'";
		$deli = "'".$_POST['dl']."'";
		$assignee = "'".$_POST['assignee']."'";

		if(!isset($_SESSION['loggedin']))
			echo 'Log in before adding a task.';


		else{
			
			$assignor = "'".$_SESSION['username']."'";

			$query = "INSERT INTO `tasks` VALUES(".$desc.','.$deli.','.$assignee.','.$assignor.')';

			if(mysql_query($query)){
				echo "Successfully added to databade<br/>";
			}

			else{
				echo "Unable to add to database<br/>";
				echo mysql_error();
			}

			unset($_SESSION['loggedin']);
		}


	}


}


?>

<html>

<body>

	<form action="" method="POST">

		Work Description: <textarea name="desc" rows="3" cols="4"></textarea> <br/>

		Deadline: <input type="date" name="dl"/> <br/>

		Assign this to: <input type="text" name="assignee"/> <br/>

		<input type="submit" value="Assign"/>

	</form>

</body>

</html>