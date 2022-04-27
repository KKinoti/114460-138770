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
} else {
    echo "success";
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $password2 = $_POST['passwordd'];


    //creating database
    $myquery = "insert into clients (fname,lname,email,number,password,passwordd) values ('$firstname','$lastname','$email','$number','$password','$password2')";



//            $sql="
//                    CREATE TABLE clients(id INT(10)NOT NULL AUTO_INCRIMENT PRIMARY KEY,
//                    fname VARCHAR(25)NOT NULL,Lname VARCHAR(25)NOT NULL,email VARCHAR(25)NOT NULL,
//                    number VARCHAR(25)NOT NULL,fname VARCHAR(25)NOT NULL,password VARCHAR(25)NOT NULL,
//                    passwordd VARCHAR(25)NOT NULL);
//                    ";
        if (mysqli_query($con, $myquery)) {

            if (!empty($firstname) && !empty($lastname) &&
                !empty($email) && !empty($number) &&
                !empty($password) && !empty($password2) && is_numeric($number)) {
                echo("table created");
//                    header("location:logout.php");


            } else {
                echo "not created";
            }

        } else {
            echo "error" . mysqli_error($con);
        }

    } else {
        echo("enter valid information!");
    }

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up Page</title>
	<link rel="stylesheet" href="styling.css">
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
<form   method="post" >
	<div class="text"><label><input type="text" name="fname" placeholder="First name" id="fname"></label></div>
		<div class="text"><label><input type="text" name="lname" placeholder="Last name" id="lname"></label></div>
	<div class="text"><label><input type="email" name="email" placeholder="Email" id="email"></label></div>

	<div class="text"><label><input type="number" name="number" placeholder="MobileNumber" id="mobilenumber"></label></div>
	<div class="text">	<label><input type="password" name="password" placeholder="Inputpassword" id="pass1"></label></div>
	<div class="text"><label><input type="password" name="passwordd" placeholder="Confirmpassword" id="pass2"></label></div>
	
	<div><label><input type="submit" name="submit"></label></div>
    <div class="">Already a member?<a href="login.php">Log in</a></div>
	</form>
	
	</div>

	<script src="auth.js">
	</script>
</body>
</html>

