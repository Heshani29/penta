<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: admin.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM admin WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admin (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$error1= "<p style='padding: 5px;
		text-align: center;
		padding-bottom: 10px;
		border: 1px solid transparent;
		border-radius: 5px;background-color: #c3e1d2f6;
		border-color: #325f48f6;
		color: #325f48f6;'>Registration Complete</p>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				$error2= "<p style='padding: 5px;
		text-align: center;
		padding-bottom: 10px;
		border: 1px solid transparent;
		border-radius: 5px;background-color: #f2dede;
		border-color: #ebccd1;
		color: #a94442;'>Woops! Something Wrong Went</p>";
				
			}
		} else {
			$error3= "<p style='padding: 5px;
		text-align: center;
		padding-bottom: 10px;
		border: 1px solid transparent;
		border-radius: 5px;background-color: #f2dede;
		border-color: #ebccd1;
		color: #a94442;'>Woops! Email Already Exists.</p>";
			
		}
		
	} else {
		$error4= "<p style='padding: 5px;
		text-align: center;
		padding-bottom: 10px;
		border: 1px solid transparent;
		border-radius: 5px;background-color: #f2dede;
		border-color: #ebccd1;
		color: #a94442;'>Password Not Matched.</p>";
		
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="style1.css?v=<?php echo time(); ?>">

	<title>Register Form - Pure Coding</title>
</head>
<body>
	<div class="container" style="height:550px">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				
			</div>
			
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				<div> <?php echo"<br>".$error3?></div>
				<div><?php echo $error2?></div>
				<div><?php echo $error4?>
				<?php echo $error1 ?>
				</div>
			
			
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
				<div>
			</div>
			
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>