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
			<?php 
				include("config.php");
				$username = "<script> document.write(localStorage.getItem('username'));</script>";
				
				$query = "SELECT * FROM Users WHERE Username ='" . $username . "'";
				echo $query;
				$result = mysql_query($query);
				
				echo "<li>Name:" .$result["Name"]. "</li>";
				echo "<li>Email:" .$result. "</li>";
				echo "<li>Phone:" .$result["Phone"]. "</li>";
				echo "<li>Dorm:" .$result["Dorm"]. "</li>";
				echo "<li>City:" .$result["City"]. "</li>";
				echo "<li>School:" .$result["School"]. "</li>";
			?>
	</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>

			<li><a href="index.php" id="mygames"  data-icon="custom">My Games</a></li>
			<li><a href="findgame.php" id="findgame" data-icon="custom">Find Game</a></li>
			<li><a href="creategame.php" id="newgame" data-icon="custom">Create Game</a></li>

		</ul>
		</div>
	</div>
</div>
</body>
</html>
