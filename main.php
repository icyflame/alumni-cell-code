<?php

session_start();
$_SESSION['loggedin'] = 1;
$file = simplexml_load_file('exa.xml');

echo $file->person[0]->name.' is '.$file->person[0]->age;

?>