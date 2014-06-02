<?php

session_start();

require 'checklogin.php';
require 'logoutbtn.php';
require 'connect.php';

$user = $_SESSION['username'];

echo "<b>Tasks assigned to you</b><br/><br/>";

// display all the tasks assigned to user.

$query = "SELECT * FROM `tasks` WHERE assignee='$user'";

$res = mysql_query($query);

if(mysql_num_rows($res) == 0){
    echo "No tasks have been assigned to you.<br/><br/>";
}

else{

	echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th></tr>";

	while($row = mysql_fetch_assoc($res)){

		$desc = $row['taskdesc'];
		$nor = $row['assignor'];
		$nee = $row['assignee'];
		$deadline = $row['deadline'];

		echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td></tr>";

	}

	echo "</table>";

}

echo "<b>Tasks assigned by you</b><br/><br/>";

$query = "SELECT * FROM `tasks` WHERE assignor='$user'";

$res = mysql_query($query);

if(mysql_num_rows($res) == 0){
	echo "No tasks have been assigned by you.<br/><br/>";
}

else{

	echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th></tr>";

	while($row = mysql_fetch_assoc($res)){

		$desc = $row['taskdesc'];
		$nor = $row['assignor'];
		$nee = $row['assignee'];
		$deadline = $row['deadline'];

		echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td></tr>";

	}

	echo "</table>";

}

?>

<a href="assign-work.php">Assign a new task</a> <br/>
<a href="userslist.php">Look at a list of all registered users</a> <br/>