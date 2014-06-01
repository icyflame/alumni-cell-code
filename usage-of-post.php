<?php

if(!empty($_POST)){
echo $_POST['un'].'<br/>';
echo $_POST['pw'].'<br/>';
echo $_POST['fn'].'<br/>';
echo $_POST['ln'].'<br/>';
}

?>

<html>

<body>

	<form action="usage-of-post.php" method="POST">

		username:<input type="text" name="un"/><br/>
		password:<input type="text" name="pw"/><br/>
		firstname:<input type="text" name="fn"/><br/>
		lastname:<input type="text" name="ln"/><br/>

		<input type="submit">

	</form>

</body>

</html>