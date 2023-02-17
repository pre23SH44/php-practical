<?php
include("db.php");

if (isset($_POST['submit'])) {
	$user= $_POST['username'];
	$pass= $_POST['password'];

	$select= mysqli_query($connect, "select * from admin where binary username= '$user' ")
	or die("could not login".mysqli_error($connect));
	$num= mysqli_num_rows($select);
	if (mysqli_num_rows($select)){
		while ($row=mysqli_fetch_assoc($select)) {
			$nweze= $row['username'];
			$okey= $row['password'];
		}
		if (password_verify($pass, $okey)) {
		if ($num>0) {
		setcookie("oka", $nweze, time()+3600);
		header("location:control.php");
		}
}
else{
	echo "sorry, wrong password";
}
}
else{
	echo "wrong username";
}
}

?>


















<!DOCTYPE html>
<html>
<head>
	<title>User login</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<p>
		<label>Username:</label>
		<input type="text" name="username" id="username" value="" />
	</p>
	<p>
		<label>Password:</label>
		<input type="password" name="password" id="password" value="" />
	</p>

	<p>
		<label>Login</label>
		<input type="submit" name="submit" id="submit" value="login" />
	</p>
</form>
</body>
</html>