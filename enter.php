<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster | Submit</title> 
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

<div data-role="page">

	<div data-role="header">
		<h1>My Title</h1>
		<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->

	<div data-role="content">	
		
		<?php>
		echo $_Post[username];
		if($_Post[username] != NULL){
		include("config.php");
		$query = "INSERT INTO Users VALUES('$_POST[username]', '$_POST[password]')";
		$result = mysql_query($query);
		$query = "SELECT * FROM Users WHERE Username='" . $_POST['username'] . "'";
		//echo "SELECT * FROM Users WHERE Username='" . $_POST['username'] . "'";
		$result = mysql_query($query);
		//echo $_POST["username"];
		if ($result == NULL) {
			echo "Username not in DB";
		}
		else {
			echo "<p>Thank you, <strong>".$_POST["username"]."</strong>. You are now logged in.</p>";
		}
		}
			?>
	<div id="UserInfo"> 
		
	</div>
			
			<script type="text/javascript">
				// Save the username in local storage. That way you
				// can access it later even if the user closes the app.
				localStorage.setItem('username', '<?=$_POST["username"]?>');
			</script>
	</div><!-- /content -->

	
	
	<script type="text/javascript">
		$("#logout").click(function() {
			localStorage.removeItem('username');
			$("#form").show();
			$("#logout").hide();
		});
	</script>
</div><!-- /page -->

</body>
</html>