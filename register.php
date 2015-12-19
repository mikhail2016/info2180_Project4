<!DOCTYPE html>
<html>
<head>
    <title>Cheapo Mail</title>
    <script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.2.0/prototype.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/cheapo.js"></script>
</head>
<body>
	<div id="adminhome">
	<?php
	include_once "connect.php";
	$fssname=$_REQUEST["fsssname"];
	$lssname=$_REQUEST["lsssname"];
	$ussname=$_REQUEST["usssname"];
	$pword_con=$_REQUEST["psssword"];
	$sql = "INSERT INTO User(first_name, last_name, password, username)
	VALUES ('$fssname', '$lssname', '$pword_con','$ussname')";
	$add= mysql_query($sql,$conn);
	if (! $add){
			echo "User could not be added, try again.";
			echo '<input id= "adhome" type="button" value="back">';
		} 
		else {
			echo"User added successfully.";
			echo '<input id= "adhome" type="button" value="return home">';
		}
	mysql_close($conn);	
	?>
</div>
</body>
</html>