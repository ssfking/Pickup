<?php
session_start();
include("config.php");
$username = $_POST["username"];
$password = $_POST["password"];
$error1 = $_GET["error"];

$error="";
if (isset($username) || isset($password)) {

    $query = "SELECT * FROM Users WHERE Username='".$username."' and Password='".$password."'";
    $result = mysql_query($query);
    if (mysql_num_rows($result) == 0) {
        $error= "username/password";
    } else {
        $row = mysql_fetch_assoc($result);
        $_SESSION['userId'] =  $row["user_id"];
        header("Location: index.php");
        //echo "<html><body><script> window.location = 'index.php'; </script></body></html>";
        //Redirect2URL("index.php");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
<title>Pickup</title> 
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

</head>

<body>

    <div data-role="page" id="login_page">
    
        <div data-role="header">
            <h1>Sign In
            </h1>
            <a class="ui-btn-right" data-theme="b" href="register.php">
                Sign Up
            </a>        
        </div>
        <div data-role="content">
            <p>
            Welcome to Pick up! Please sign in to use the app. 
            </p>
            <?php if ($error=="username/password"): ?>
            <p style="color:red">
            Username/password Incorrect. Please try again.
            </p>
            <?php endif; ?> 
            <form action="login.php" method="post">
            <div data-role="fieldcontain">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username"/>
            </div>
            <div data-role="fieldcontain">
                <label for="password"> Password: </label>
                <input type="password" name="password" id="password"/>
            </div>
            <button type="submit" data-theme="b" value="submit"> Submit </button>
            </form>
        </div>
    </div>
</body>
</html>

