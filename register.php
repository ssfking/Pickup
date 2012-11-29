<?php
session_start();

include("config.php");
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$password2 = $_POST["password2"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$school = $_POST["school"];

$error="";
if (isset($username)) {
    $query= "SELECT COUNT(*) FROM Users WHERE Username='".$username."'";
    $queryResult = mysql_query($query);
    $result = mysql_fetch_row($queryResult);
    $result = $result[0];
    if ($result > 0) {
       $error= "username";
    }
    elseif ($password != $password2) {
        $error="password";
    }
    else {
       
        $query = "select MAX(user_id) FROM Users";
        $result = mysql_query($query);
        $row = mysql_fetch_row($result);
        $count = $row[0] + 1;
        $query = "INSERT INTO Users VALUES ('".$count."','".$username."','".$password."','".$name."','".$email."','".$phone."','".$school."')";
        $result = mysql_query($query);
        $_SESSION['userId'] = $count;
        header("Location: index.php");
    }

}

?>




<!DOCTYPE html>
<html>
	<head>
		<title>Pick Up</title>
		<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">

	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
		
		
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
    <div data-role="page">
        <div data-role="header">
            <h1>Sign Up</h1>
        </div>

        
    <div data-role="content">    
		<p> Welcome to Pick up! Please fill out your personal information to sign up. </p>

<?php if ($error == "username") : ?>
        
        <p style="color:red">
        Username already exists in database. Try another name.
        </p>

<?php elseif ($error=="password") : ?>
        <p style="color:red">
        Passwords don't match. Try again.
        </p>

<?php endif; ?>

        <form action="register.php" method="post">
		<div data-role="fieldcontain">
            <label for="username">Username:</label>
	    	<input type="text" name="username" id="username"/>
        </div>
        <div data-role="fieldcontain">
		    <label for="password">Password:</label>
		    <input type="password" name="password" id="password"/>
        </div>
        <div data-role="fieldcontain">
		    <label for="password2">Repeat Password:</label>
		    <input type="password" name="password2" id="password2"/>
        </div>
        <div data-role="fieldcontain">		
            <label for="name">Name:</label>
		    <input type="text" name="name" id="name"/>
		</div>
        <div data-role="fieldcontain">		
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"/>
		</div>
        <div data-role="fieldcontain">		
            <label for="phone">Phone:</label>
		    <input type="text" name="phone" id="phone"/>
        </div>
        <div data-role="fieldcontain">		
            <label for="school">School:</label>
		    <input type="text" name="school" id="school"/>
		</div>
        <button type="submit" data-theme="b" value="Register">
        Submit
        </button>
		</form>
        </div>
    </div>
	</body>
