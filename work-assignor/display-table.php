<?php

require 'connect.php';

$res = mysql_query("SELECT * FROM `tasks`");

echo "<table border=2 cellpadding=10><tr><th>Deadline</th><th>Description</th><th>Assignor</th><th>Assignee</th></tr>";

while($row = mysql_fetch_assoc($res)){

	$desc = $row['taskdesc'];
	$nor = $row['assignor'];
	$nee = $row['assignee'];
	$deadline = $row['deadline'];

	echo "<tr><td>$deadline</td><td>$desc<td>$nor</td><td>$nee</td></tr>";

}

echo "</table>"

?>