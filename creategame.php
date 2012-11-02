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
		<a href="index.php" data-role="button" data-theme="b" >Back</a>
		<h1>Pickup</h1>
		<a href="signout.php" data-role="button" data-theme="b" >Sign Out</a>
	</div><!-- /header -->
	
	<div data-role="content">	

	<div data-role="fieldcontain" data-type="horizontal">
		<label for="select-choice-1" class="select">Sport</label>	
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
		
	<div data-role="fieldcontain" class="ui-field-contain ui-body ui-br"><label for="date" class="ui-input-text">Date</label><input type="date" name="date" id="date" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"></div>

	<fieldset data-role="controlgroup" data-type="horizontal" class="ui-corner-all ui-controlgroup ui-controlgroup-horizontal"><div role="heading" class="ui-controlgroup-label">Time</div><div class="ui-controlgroup-controls">
				
		<label for="select-choice-month" class="ui-select">Hour</label>
		<div class="ui-select"><select name="select-choice-hour" id="select-choice-hour">
			<option value="1">1:</option>
			<option value="2">2:</option>
			<option value="3">3:</option>
			<option value="4">4:</option>
			<option value="5">5:</option>
			<option value="6">6:</option>
			<option value="7">7:</option>
			<option value="8">8:</option>
			<option value="9">9:</option>
			<option value="10">10:</option>
			<option value="11">11:</option>
			<option value="12">12:</option>
		</select></div>

		<label for="select-choice-day" class="ui-select">Minute</label>
		<div class="ui-select"><select name="select-choice-minute" id="select-choice-minute">
			<option value="00">00</option>
			<option value="15">15</option>
			<option value="30">30</option>
			<option value="45">45</option>
		</select></div>

		<label for="select-choice-year" class="ui-select">AM</label>
		<div class="ui-select"><select name="select-choice-am" id="select-choice-am">
			<option value="am">AM</option>
			<option value="pm">PM</option>
		</select></div></div>
	</div></fieldset>

	<div data-role="fieldcontain" class="select">
		<label for="location">Location</label>
		<input type="text" name="location" id="location" value="E.g. Manzanita Field"/>
	</div>

	<a href="index.php" data-role="button" data-theme="b" data-icon="arrow-r" data-iconpos="right">Create Game!</a>

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>

			<li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
			<li><a href="findgame.php" id="findgame" data-icon="custom">Find Game</a></li>
			<li><a href="#" id="newgame" class="ui-btn-active" data-icon="custom">Create Game</a></li>

		</ul>
		</div>
	</div>
</div>
</body>
</html>