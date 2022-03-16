<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Updates</title>
</head>
<body>
<h1 align="center">Registered Users List</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
			$gender = test($_POST['gender']);
			$dateofbirth = test($_POST['dateofbirth']);
			$religion = test($_POST['religion']);
			$presentaddress = test($_POST['presentaddress']);
			$permanentaddress = test($_POST['permanentaddress']);
			$phone = test($_POST['phone']);
			$email = test($_POST['email']);
			$weblink = test($_POST['weblink']);
			$uname = test($_POST['uname']);
			$pwd = test($_POST['pwd']);
			$conpwd = test($_POST['conpwd']);

			if (empty($firstname) or empty($lastname) or empty($gender) or
				empty($dateofbirth) or empty($religion) or empty($presentaddress) or empty($email) or empty($uname) or empty($pwd) or
				empty($conpwd) or empty($lastname))
			{
				echo "Please fill up the form properly";
			}
			else if ($pwd != $conpwd)
			{
				echo "Password don't match";
			}
			else
			{
				define("FILENAME", "users.json");
				$file1 = fopen(FILENAME, "r");
				$fr = fread($file1, filesize(FILENAME));
				$json = json_decode($fr);
				fclose($file1);

				$file2 = fopen(FILENAME, "w");
				$data = array("firstname" => $firstname, "lastname" => $lastname, "gender" => $gender, "dateofbirth" => $dateofbirth, "religion" => $religion, "presentaddress" => $presentaddress, "permanentaddress" => $permanentaddress, "phone" => $phone, "email" => $email, "weblink" => $weblink, "uname" => $uname, "pwd" => $pwd, "conpwd" => $conpwd);

				if ($json === NULL)
				{
					$data = array($data);
					$data = json_encode($data);
					fwrite($file2, $data);
				}
				else
				{
					$json[] = $data; 
					$data = json_encode($json);
					fwrite($file2, $data);
				}
				fclose($file2);

				$data = json_decode($data);

				echo "Registration Successful!";

				echo "<br><br>";

				echo "<table border='1'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Gender</th>";
				echo "<th>Date Of Birth</th>";
				echo "<th>Religion</th>";
				echo "<th>Present Address</th>";
				echo "<th>Permanent Address</th>";
				echo "<th>Phone</th>";
				echo "<th>Email</th>";
				echo "<th>Website</th>";
				echo "<th>Username</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				for ($i = 0; $i < count($data); $i++) {
					echo "<tr>";
					echo "<td>" . $data[$i]->firstname ."</td>";
					echo "<td>" . $data[$i]->lastname ."</td>";
					echo "<td>" . $data[$i]->gender ."</td>";
					echo "<td>" . $data[$i]->dateofbirth ."</td>";
					echo "<td>" . $data[$i]->religion ."</td>";
					echo "<td>" . $data[$i]->presentaddress ."</td>";
					echo "<td>" . $data[$i]->permanentaddress ."</td>";
					echo "<td>" . $data[$i]->phone ."</td>";
					echo "<td>" . $data[$i]->email ."</td>";
					echo "<td>" . $data[$i]->weblink ."</td>";
					echo "<td>" . $data[$i]->uname ."</td>";
					echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
			}
		}
	?>
	<br><br>
	<a href="registration.html">Go to Registration</a>
	<br><br>
	<a href="login.php">Log In</a>

</body>
</html>