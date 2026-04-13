<?php
session_start();
require 'db.php';
if($SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$stat = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	$stat->execute([$username, password]);

	if($stmt->rowCount() > 0){
		$_SESSION['user'] =$username;
		header("Location: dashboard.php");
		exit();
	}else{
		$error = "Invalid Username or Password";
	}
}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h2>CIE BALUYOS</h2>

	<?php if (! empty($error)) echo "<p style = 'color:red'>$error</p>"?>

	<form method='POST'>
		<label>User Nmae:</label><br>
		<input type= "text" name="username"><br>
		<label>Password:</label><br>
		<input type="password" name="username"><br>
		<button type= "">Login</button>
    </form>
</body>
</html>
