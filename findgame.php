<!DOCTYPE html> 
<html>

<head>
	<title>Pickup - Find a Game</title> 
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

<div data-role="page" id="broadNameSearch">

	<div data-role="header" data-id="findHeader" data-position="fixed">
		<h1>Find Game</h1>

	</div><!-- /header -->
	
	<div data-role="content">	
	
	
	<ul data-role="listview" data-inset="false" data-filter="true">
		<li><a href="soccerSearch">Soccer</a></li>
		<li><a href="soccerSearch">Hockey</a></li>
		<li><a href="soccerSearch">Ultimate</a></li>
		<li><a href="soccerSearch">Volleyball</a></li>
		<li><a href="soccerSearch">Football</a></li>
		<li><a href="soccerSearch">Others</a></li>
	</ul>

	</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>

			<li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
			<li><a href="#" id="findgame" class="ui-btn-active ui-state-persist" data-icon="custom">Find Game</a></li>
			<li><a href="#" id="newgame" data-icon="custom">Create Game</a></li>
		</ul>
		</div>
	</div>
</div>

<div data-role="page" id="soccerSearch">
	<div data-role="header" data-id="findHeader" data-position="fixed">
		<a href="#broadNameSearch" data-rel="back">Back</a>
                <h1>Find Game</h1>

        </div><!-- /header -->

        <div data-role="content">


        <ul data-role="listview" data-inset="false" data-filter="true">
                <li><a href="gameDetail.php">Tressider fields</a></li>
                <li><a href="gameDetail.php">EV Fields</a></li>
                <li><a href="gameDetail.php">Manz courtyard</a></li>
                <li><a href="gameDetail.php">Toyon fields</a></li>
                <li><a href="gameDetail.php">Coho fields</a></li>
        </ul>


        </div>
        <div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
                <div data-role="navbar" class="nav-glyphish-example" data-grid="b">
                <ul>

                        <li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
                        <li><a href="#broadNameSearch" id="findgame" class="ui-btn-active ui-state-persist" data-icon="custom">Find Game</a></li>
                        <li><a href="#" id="newgame" data-icon="custom">Create Game</a></li>
                </ul>
                </div>
        </div>
</div>

</body>
</html>
