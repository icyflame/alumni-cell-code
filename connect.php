<?php

// if(!empty($_POST)){

	// echo $_POST['un'].'<br/>';
	// echo $_POST['pw'].'<br/>';

$host = '166.62.8.13';

$name = 'testlearndo';

$pass = 'Person%45';

$dbname = 'testlearndo';

if(mysql_connect($host, $name, $pass)){

	echo 'connected to server<br/>';

	if(mysql_select_db($dbname)){

		echo 'connected to database<br/>';

	}

}

?>