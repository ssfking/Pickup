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

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

</head>

<body>

<div data-role="page" id="filter">

	<div data-role="header">
		<a href="#" data-role="button" data-theme="b" >My Profile</a>
		<h1>Pickup</h1>
		<a href="#" data-role="button" data-theme="b" >Sign Out</a>

	</div><!-- /header -->
	
	<div data-role="content">	
	
	<ul data-role="listview" data-inset="true" data-filter="true">
		<li><a href="#">Soccer, 11/2/12</a></li>
		<li><a href="#">Hockey, 11/3/12</a></li>
		<li><a href="#">Ultimate, 11/4/12</a></li>
		<li><a href="#">Volleyball, 11/5/12</a></li>
		<li><a href="#">Football, 11/6/12</a></li>
	</ul>

	<a href="#" data-role="button" data-theme="b" data-icon="arrow-r" data-iconpos="right">View Past Games</a>

	</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>

			<li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
			<li><a href="findgame.php" id="findgame" data-icon="custom">Find A Game</a></li>
			<li><a href="#" id="newgame" class="ui-btn-active" data-icon="custom">Create Game</a></li>

		</ul>
		</div>
	</div>
</div>
</body>
</html>