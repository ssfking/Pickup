<?php
session_start();

include("config.php");
$userId = $_SESSION['userId'];
if (!isset($userId)) {
    header("Location: login.php");
}
$prev=$_GET["prev"];
$gameId = $_GET["gameId"];

$status = $_POST["status"];
if (isset($status)){
    if ($status == "join") {
        $query = "INSERT INTO RelationTable VALUES ('".$gameId."','".$userId."')";
        $result = mysql_query($query);
    }
    elseif ($status == "leave") {
       $query = "DELETE FROM RelationTable WHERE game_id='".$gameId."'and user_id='".$userId."'"; 
       $result = mysql_query($query);
    }
    
    elseif ($status == "start") {
        $query = "UPDATE games SET status='ongoing' WHERE game_id='".$gameId."'";
        $result = mysql_query($query);
    }
    else if ($status == "close") {
       $query = "DELETE FROM RelationTable WHERE game_id='".$gameId."'";
       $result = mysql_query($query);
       $query = "DELETE FROM games WHERE game_id='".$gameId."'";
       $result = mysql_query($query); 
    }
}
$query = "SELECT * FROM games WHERE game_id='".$gameId."'";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);

$query = "SELECT * FROM Users WHERE user_id='".$row['owner']."'";
$result = mysql_query($query);
$row2 = mysql_fetch_assoc($result);

$query = "SELECT COUNT(*) FROM RelationTable WHERE game_id='".$gameId."'";
$result = mysql_query($query);
$row3 = mysql_fetch_row($result);
$gamePeopleCount = $row3[0];
//also need to know if user is creator or if user joined the game

$query = "SELECT COUNT(*) FROM RelationTable WHERE game_id='".$gameId."' and user_id='".$userId."'";
$result = mysql_query($query);
$row4 = mysql_fetch_row($result);
$membership = false;
if ($row4[0] > 0) {
    $membership = true;
}
?>
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
        <link rel="stylesheet" href="jquery-mobile-red-buttons.css"/>

        <script src="jquery-1.8.2.min.js"></script>
        <script src="jquery.mobile-1.2.0.js"></script>

        <link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

</head>

<body>

<div data-role="page" id="gameDetail">
	<div data-role="header" data-id="findHeader" data-position="fixed">
                
    <?php if ($prev == "index"): ?>
    
        <a href="index.php">Back</a>

    <?php elseif ($prev=="findgame"): ?>
        <a href="findgame.php">Back</a>
    <?php endif ?>

        <h1>Game Detail</h1>


        </div><!-- /header -->

        <div data-role="content">

	
	<p>
	Game Type: <?=$row["sport"] ?>
	</p>
	
	<p>
	Date: <?= $row["date"] ?>
	</p>

	<p>
	Start Time: <?=$row["time"]?> 
	</p>
	
	<p>
	Location: <?=$row["location"]?>
	</p>
	
	<p>
	Current Size: <?=$gamePeopleCount?>
	</p>

	<p>
	Target Size: <?=$row["capacity"]?>
	</p> 

    <p>
    Status:
    <?php if ($row["Status"] == "ongoing"): ?>
        Game on
    <?php else: ?>
        Pending
    <?php endif; ?>
    </p>
	
    <p>
    Owner Name: <?=$row2["Name"]?>
    </p>

    <p>
    Owner Phone #: <?=$row2["Phone"]?>
    </p>
    
    <p>
    Owner Email: <?=$row2["Email"]?>
    </p>

	<p>
    
    <?php if ($userId == $row["owner"]):?>
        <?php if ($row["Status"] == "ongoing"): ?>
	        <form action="index.php" method="get">
	        <input type="hidden" name="status" value="close" />
            <input type="hidden" name="game_id" value="<?=$gameId?>" />
	        <button  data-theme="r" type="submit" value="Delete" onClick ="return confirm ('Are you sure you want to delete game?')">Delete Game
            </button>
	        </form>
        <?php else: ?>
            
	        <form action="index.php" method="get">
	        <input type="hidden" name="status" value="start" />
            <input type="hidden" name="game_id" value="<?=$gameId?>" />
	        <button data-theme="b" type="submit" value="Start"/>Start Game
            </button>
	        </form>
            
           <br /> 

            <form action="index.php" method="get">
            <input type="hidden" name="status" value="close" />
            <input type="hidden" name="game_id" value="<?=$gameId?>" />
            <button  data-theme="r" type="submit" value="Delete" onClick ="return confirm ('Are you sure you want to delete game?')">Delete Game
            </button>
            </form>



        <?php endif ;?>    
    <?php else: ?>
        <?php if ($membership == true): ?>
	        <form action="index.php" method="get">
	        <input type="hidden" name="status" value="leave"/>
            <input type="hidden" name="game_id" value="<?=$gameId?>" />
            <button data-theme="r" type="submit" value="Leave" onClick ="return confirm ('Are you sure you want to leave game?')" /> Leave Game
	        </button>
            </form>
        <?php else: ?>
	        <form action="index.php" method="get">
	        <input type="hidden" name="status" value="join" />
            <input type="hidden" name="game_id" value="<?=$gameId?>" />
            <button data-theme="b" type="submit" value="Join"/> Join Game
            </button>
	        </form>
        <?php endif ;?>       
    
    <?php endif ;?> 
	</p>
	</div>
</div>
</body>
</html>

