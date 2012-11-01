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
		<a href="#" data-role="button" data-theme="b" >My Profile</a>
		<h1>Pickup</h1>
		<a href="#" data-role="button" data-theme="b" >Sign Out</a>
	</div><!-- /header -->
	
	<div data-role="content">	

	<div data-role="fieldcontain">
		<label for="select-choice-1" class="select" datafilter="true">Sport:</label>	
		<select name="select-choice-1" id="select-choice-1">
			<option value="basketball">Basketball</option>
			<option value="fieldhockey">Field Hockey</option>
			<option value="football">Football</option>
			<option value="icehockey">Ice Hockey</option>
			<option value="soccer">Soccer</option>
			<option value="streethockey">Street Hockey</option>
			<option value="ultimate">Ultimate Frisbee</option>	
		</select>
	</div>

	</ul>

	</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>

			<li><a href="#" id="mygames" class="ui-btn-active" data-icon="custom">My Games</a></li>
			<li><a href="findgame.php" id="findgame" data-icon="custom">Find A Game</a></li>
			<li><a href="#" id="newgame" data-icon="custom">Create Game</a></li>

		</ul>
		</div>
	</div>
</div>
</body>
</html>