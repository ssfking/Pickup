<body>

<div class="gamearea">

<?php

	// Take in parameters
	$game_id = $_POST["gameid"];
	$user_id = "SELECT user_id FROM Users Where Username='" . $_POST['username'] . "'";

	echo "<p>Game is: ".$game_id."</p>;
	echo "<p>User is: ".$user_id."</p>;	

	// Insert into game
	include("config.php");
	$query = "INSERT INTO `Relation Table` VALUES ('$game_id', '$user_id')";
	$result = mysql_query($query);

	if ($result == NULL) {
		echo "Game not in DB";
	} else {
		echo "<p>You've been added to the game.</p>";
	}

?>
</div>
</body>