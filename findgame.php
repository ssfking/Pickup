<?php
session_start();

include("config.php");

$userId = $_SESSION['userId'];
if (!isset($userId)) {
    header("Location: login.php");
}

$filter = $_POST["filter"];
$status = $_POST["status"];

if (isset($status)){
    if ($status == "join") {
        //never happen
    }
    elseif ($status == "leave") {

    }
    elseif ($status == "start") {

    }
    else if ($status == "close") {

    }
}


$resultArr = array();
/*
$query = "SELECT * FROM RelationTable WHERE user_id!='".$userId."'";
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)){
    $query = "SELECT * FROM games WHERE game_id='".$row["game_id"]."'";
    $result2 = mysql_query($query);
    $row2 = mysql_fetch_assoc($result2);
    if ($row2["owner"] == $userId) {
        array_push($resultArr1,$row2);
    } else {
        array_push($resultArr2,$row2);
    }
}
*/
$query = "SELECT * FROM games";
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)){
    array_push($resultArr, $row);
}

//get info from db
//also need to know if user is creator or if user joined the game


?>



<!DOCTYPE html> 
<html>

<head>
<script src="//cdn.optimizely.com/js/141292108.js"></script> 
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
		<!--<a href="filter.php" data-role="button" class="ui-btn-right" data-theme="b" >Filter</a>
-->
	</div><!-- /header -->
	
	<div data-role="content">	

<ul data-role="listview" data-inset="true" data-filter="false">


<?php foreach ($resultArr as $value): ?>
<li data-icon="false">
    <a href="gameDetail.php?prev=findgame&gameId=<?=$value["game_id"]?>">
        <div style="width:100px; float:left;margin-right:30px">
            <p>
                <h3>
                    <?= $value["sport"] ?>
                </h3>
            </p>
            <p>
                <strong>
                    <?= $value["time"]." ".$value["date"] ?>
                </strong>
            </p>
            <p>
                <strong>
                    <?= $value["location"] ?>
                </strong>
            </p>
        </div>
        <div style="float:left;" >
            <p>
                <? if ($value['Status'] == "ongoing"): ?>
                <h3 style="color:green">
                    Game on
                </h3>
                <? else: ?>
                       
                <h3 style="color:red">
                    Pending
                </h3>
                <? endif; ?>
            <p>
            <p>
                <strong>
                <?php
    $queryCount = "SELECT COUNT(*) FROM RelationTable WHERE game_id='".$value["game_id"]."'";
    $countResult = mysql_query($queryCount);
    $countResult = mysql_fetch_row($countResult);
    $countResult = $countResult[0];
    echo($countResult." joined");
                ?>
                </strong>
            </p>
        </div>
    </a>
    <?php if ($userId == $value["owner"]): ?>
        <? if ($value['Status'] != 'ongoing'): ?>
            <a data-icon="check" href="index.php?status=start&game_id=<?=$value['game_id']?>">Start Game</a>
        <? endif; ?>
    <? else: ?>

        <?php 

            $query = "SELECT COUNT(*) FROM RelationTable WHERE game_id='".$value["game_id"]."' and user_id='".$userId."'";
            $result = mysql_query($query);
            $row4 = mysql_fetch_row($result);
            $membership = false;
            if ($row4[0] > 0) {
                $membership = true;
            }

        ?>

        <? if ($membership != true) :?>
            <a data-icon="plus" href="index.php?status=join&game_id=<?=$value['game_id']?>">Join Game</a>
        <? endif ;?>
    <? endif; ?>
</li>
<?php endforeach; ?>

</ul>



	</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example">
		<ul>

			<li><a href="index.php" id="mygames" data-icon="custom">My Games</a></li>
			<li><a href="findgame.php" id="findgame" class="ui-btn-active" data-icon="custom">Find Game</a></li>
			<li><a href="creategame.php" id="newgame" data-icon="custom">Add Game</a></li>
			<!--<li><a href="Account.php" id="settings" data-icon="custom">Settings</a></li>
		    -->
        </ul>
		</div>
	</div>
</div>
</body>
</html>
