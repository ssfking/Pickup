<!DOCTYPE html> 
<html>

<head>
	<title>Pickup - My Games</title> 
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

<div data-role="page" id="filter">

	<div data-role="header">
		<a href="index.php" data-role="button" data-theme="b" >Back</a>
		<h1>Pickup</h1>
		<a href="#" data-role="button" data-theme="b" >Sign Out</a>

	</div><!-- /header -->
	
	<div data-role="content">	
		<ul>
			<li> Email: </li>
			<li> Phone: </li>
			<li> Dorm: </li>
			<li> School: </li>
			<li> City: </li>
	</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example">
		<ul>

			<li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
			<li><a href="findgame.php" id="findgame" data-icon="custom">Find Game</a></li>
			<li><a href="creategame.php" id="newgame" data-icon="custom">Add Game</a></li>
			<li><a href="Account.php" id="settings" class="ui-btn-active" data-icon="custom">Settings</a></li>

		</ul>
		</div>
	</div>
</div>
</body>
</html>
