<?php
session_start();

include("config.php");
$username = $_POST["username"];
$password = $_POST["password"];

if (isset($username) || isset($password)) {
    
    $query = "SELECT * FROM Users WHERE Username='".$username."' and Password='".$password."'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    if ($result == NULL) {
        header("Location: login.php?error=true");     
    } else {
        $_SESSION['userId'] =  $row["user_id"];
    }
}

$userId = $_SESSION['userId'];
if (!isset($userId)) {
    header("Location: login.php?yo=wtf");
}


$sport = $_POST["sport"];
$date = $_POST["date"];
$type = $_POST["type"];
$time = $_POST["time"];
$location = $_POST["location"];

if (isset($sport) || isset($date) || isset($location) || isset($type) || isset($time)){
    $query = "select MAX(game_id) FROM games";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    $count = $row[0] + 1;
    $query = "INSERT INTO games VALUES ('".$count."','".$sport."','".$location."','".$date."','".$time."', 'pending','".$userId."', '10')";
    $result = mysql_query($query);
    $query = "INSERT INTO RelationTable VALUES ('".$count."','".$userId."')";
    $result = mysql_query($query);

}

$gameId = $_GET["game_id"];
$status = $_GET["status"];
if (isset($status) && isset($gameId)){
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


$resultArr1 = array();
$resultArr2 = array();
$query = "SELECT * FROM RelationTable WHERE user_id='".$userId."'";
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

?>


<!DOCTYPE html> 
<html>

<head>
<script src="//cdn.optimizely.com/js/141292108.js"></script> 
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
<h1>My Games</h1>

</div><!-- /header -->

<div data-role="content">	

<?php if (count($resultArr1) > 0) : ?>
    <div style="text-align:center; font-weight: bold; font-size:20px; margin-top: 10px;">

    Games I created
    
    
    </div>
    <ul data-role="listview" data-inset="true" data-filter="false">
    
    <?php foreach ($resultArr1 as $value): ?>
    <li data-icon="false">
        <a href="gameDetail.php?prev=index&gameId=<?= $value['game_id']?>">
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
    $queryResult = mysql_query($queryCount);
    $countResult = mysql_fetch_row($queryResult);
    $countResult = $countResult[0];
    echo($countResult." joined");
                ?>
                    </strong>
                </p>
            </div>
<!--
        <div  style="position:absolute;top:12px;left:190px;" data-role="controlgroup" data-type="vertical" data-mini="true" >
               <a href="#" data-role="button" data-mini="true" data-icon="plus" data-iconpos="notext"></a>
               <a href="#" data-role="button" data-mini="true" data-icon="minus" data-iconpos="notext"></a>
        </div>
        </a>
-->
        </a>
        
        <? if ($value['Status'] != 'ongoing'): ?>
            <a data-icon="check" href="index.php?game_id=<?=$value["game_id"]?>&status=start">Start Game</a>
        <? endif; ?>
    </li>
    <?php endforeach; ?>
    
    </ul>

<?php endif ;?>

<div style="text-align:center; font-weight:bold; font-size:20px; margin-top:30px"> 
<?php if (count($resultArr2) > 0): ?>

    Games I joined
    
    
    
    </div>
    <ul data-role="listview" data-inset="true" data-filter="false">
    
    
    <?php foreach ($resultArr2 as $value): ?>
    <li data-icon="false">
        <a href="gameDetail.php?prev=index&gameId=<?= $value['game_id']?>">
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
                        Game on!
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
            <!--<a data-icon="delete" href="index.php?game_id=<?=$value["game_id"]?>&status=leave">Leave Game</a>
        -->
    </li>
    <?php endforeach; ?>
    
    </ul>

<?php endif ;?>

<?php if (count($resultArr1) == 0 && count($resultArr2) == 0) : ?>
    
<div style="text-align:center; font-weight:bold; font-size:20px; margin-top:30px"> 
You are not involved in any games
</div>
<?php endif ;?>

<?php if (isset($sport)): ?>
<script>
alert("Game Added!");
</script>
<?php endif ;?>
</div>
<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
<div data-role="navbar" class="nav-glyphish-example">
<ul>

    <li><a href="index.php" id="mygames" class="ui-btn-active" data-icon="custom">My Games</a></li>
    <li><a href="findgame.php" id="findgame" data-icon="custom">Find Game</a></li>
    <li><a href="creategame.php" id="newgame" data-icon="custom">Add Game</a></li>
    <!--<li><a href="Account.php" id="settings" data-icon="custom">Settings</a></li>
    -->
		</ul>
		</div>
	</div>
</div>
</body>
</html>

