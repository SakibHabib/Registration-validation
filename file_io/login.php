<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>

	<h1>Login</h1>
	<form action="LoginAction.php" method="post">
		<label id="username">Username:</label>
		<input type="text" name="username" id="username">
		<br><br>

		<label id="password">Password:</label>
		<input type="text" name="password" id="password">
		<br><br>

		<input type="submit" name="submit" value="Log In">
	</form>

	<?php
	if (isset($_SESSION['error_msg']))
	{
		echo "<p>" . $_SESSION['error_msg'] . "</p>";
	}
	?>
	<a href="registration.html">Not registered yet?</a>

</center>

</body>
</html>