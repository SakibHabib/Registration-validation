<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>
	<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username === "admin" and $password === "123")
	{
		header("Location: Welcome.php");
	}
	else
	{
		$_SESSION['error_msg'] = "Login Unsuccessful!";
		header("Location: login.php");
	}
	?>

</body>
</html>