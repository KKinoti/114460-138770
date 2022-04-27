<?php

$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "signup";
// create connection
$con = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
//checking connection
if (!$con) {
    die("failed to connect" . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
$fname = $_POST['email'];
$pass = $_POST['password'];
//log in

$myquery = "SELECT * FROM clients WHERE email = '$fname' AND password = '$pass'";
$a = mysqli_query($con,$myquery);
$row = mysqli_num_rows($a);

if ($row == 1) {

    echo "Login successful". $fname;
    header("Location: aboutus.html");
} else{
    echo "Not correct";




    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Log In Page</title>
	<link  rel="stylesheet" href="styling.css">


</head>
<body>
<nav>

	<label class="logo">ERRAND MASTER</label>

	<ul >
		<li><a href="index.php" style="text-align: right;">Home</a></li>
		<li><a href="aboutus.html" style="text-align: right;">About Us</a></li>
		<li><a href="contacts.html" style="text-align: right;">Contact Us</a></li>
	</ul>

</nav>

<div class="space"><h1>Sign Up</h1>



<div class="space"><h1>Log In</h1>
    <form method="post">
<div class="text"><label>Username<input type="text" name="email" placeholder="enter email address" id="email"></label></div>
<div class="text"><label>Password<input type="password" name="password" placeholder="input password" id="Password"></label></div>
<div class="forgotpass">Forgot Password?</div>
<input type="submit" value="Log in">
	<div class="signup">Not a member?<a href="signup.php">Sign Up</a></div>
    </form>
</div>
</div>
</body>
</html>