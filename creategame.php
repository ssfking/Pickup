<?php
session_start();

include("config.php");

$userId = $_SESSION['userId'];
if (!isset($userId)) {
    header("Location: login.php");
}

?>

<!DOCTYPE html> 
<html>

<head>
<title>Pickup - Create Game</title> 
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

</head>

<body>

<div data-role="page" id="filter">

<div data-role="header">
<h1>Add Game</h1>
</div><!-- /header -->

<div data-role="content">
    <p>
        Please fill out the following information to add a new game.
    </p>	
    <form action="index.php" method="post">
        <div data-role="fieldcontain">
        <label for="sport">Sport:</label>
        <input type="text" name="sport" id="sport"/>
        </div>
        <div data-role="fieldcontain">
        <label for="date">Date:</label>
        <input type="text" name="date" id="date"/>
        </div>
        <div data-role="fieldcontain">
        <label for="time">Time:</label>
        <input type="text" name="time" id="time" />
        </div>
        <div data-role="fieldcontain">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location"/>
        </div>
        <div data-role="fieldcontain">
        <label for="location">Capacity:</label>
        <input type="text" name="capacity" id="capacity"/>
        </div>
        <button type="submit" data-theme="b" value="Create Game!">Submit</button>
    </form>
<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
<div data-role="navbar" class="nav-glyphish-example">
<ul>

    <li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
    <li><a href="findgame.php" id="findgame" data-icon="custom">Find Game</a></li>
    <li><a href="creategame.php" id="newgame" class="ui-btn-active" data-icon="custom">Add Game</a></li>
    <!--<li><a href="Account.php" id="settings" data-icon="custom">Settings</a></li>
            -->
		</ul>
		</div>
	</div>
</div>
</body>
</html>
