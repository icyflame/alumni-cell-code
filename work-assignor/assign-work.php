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

		$date = $_POST['dl'];

		$desc = $_POST['desc'];
		$assignee = $_POST['assignee'];

		if(!isset($_SESSION['loggedin']))
			echo 'Log in before adding a task.<br/>';


		else{
			
			$assignor = $_SESSION['username'];

			$query = "INSERT INTO `tasks` VALUES('$desc', '$assignor', '$assignee', '$date')";

			// $query = "INSERT INTO `tasks` VALUES(".$desc.','."STR_TO_DATE(".$date.", '%m/%d/%Y')".','.$assignee.','.$assignor.')';

			echo $query.'<br/>';

			// query validation

			// check if the assignor is present in the database.

			if( $check = mysql_query("SELECT * FROM `users` WHERE username='$assignee'") ){

				if ( mysql_num_rows($check) == 0 ){
					echo "The name of the assignor does not exist in the database.";
				}

				else
					if(mysql_query($query)){
						echo "Successfully added task to database<br/>";
						unset($_SESSION['loggedin']);

						// send an email to both the assignor and the assignee

						$res = mysql_query("SELECT email FROM `users` WHERE username='$assignee'");

						$res_rows = mysql_fetch_assoc($res);

						$assignee_mail = $res_rows['email'];

						$res = mysql_query("SELECT email FROM `users` WHERE username='$assignor'");

						$res_rows = mysql_fetch_assoc($res);

						$assignor_mail = $res_rows['email'];

						// comppose the mail

						$subject = "[work-assigned] New task";

						$body = "
						Some points about the work assigned:<br/><br/>
						Description of the task:<br/>
						<b>$desc</b><br/>
						Deadline for this task:<br/>
						<b>$date</b><br/>";

						$headers = "From: noreply@yecindia.com";

						$body_assignee = "A new task has been assigned to you by $assignor<br/><br/>";
						$body_assignor = "You assigned a task to $assignee<br/><br/>";

						// mail(to, subject, message, headers)

						mail($assignee_mail, $subject, $body_assignee.$body, $headers);
						mail($assignor_mail, $subject, $body_assignor.$body, $headers);

					}

					else{
						echo "Unable to add to database<br/>";
						echo mysql_error();
					}

				}

			}

		}

	}


	?>

	<html>

	<body>

		<form action="" method="POST">

			<table>

				<tr>

					<td>
						Work Description: 
					</td>

					<td>
						<textarea name="desc" rows="15" cols=""></textarea>
					</td>

				</tr>

				<td>
					Deadline:
				</td>
				<td>
					<input type="date" name="dl"/>
				</td>

			</tr>
			<td>
				Assign this to: 
			</td>
			<td>
				<input type="text" name="assignee"/> 
			</td>

		</tr>

	</table>
	<input type="submit" value="Assign"/>

</form>

</body>

</html>