<!DOCTYPE html>
<html>
<head>
    <title>Cheapo Mail</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/cheapo.js"></script>
 </head>
 <body>
 	<div id="userhome">
 	<?php
 	$body=$_REQUEST["mmbody"];
 	$subject=$_REQUEST["mmsubj"];
 	$usern=$_REQUEST["mmsend"];
	$recipientn=$_REQUEST["mmrecp"];
	include_once "connect.php";
	$squery= mysql_query("SELECT id FROM User WHERE username='$usern' ");
	$rquery= mysql_query("SELECT id FROM User WHERE username='$recipientn' ");
	while($row = mysql_fetch_array($squery))
	{
		$sender=$row['id'];
	}
	while($row = mysql_fetch_array($rquery))
	{
		$receiver=$row['id'];
	}
	$sql = "INSERT INTO Message (body, subject, user_id, recipient_ids)
	VALUES ('$body', '$subject', '$sender','$receiver')";
	$add= mysql_query($sql,$conn);
	if (! $add){
			echo "Message was not sent..";
			echo'<input id= "homeuu" type="button" value="return home">';
		} 
		else {
			echo"Message sent successfully.";
			echo'<input id= "homeuu" type="button" value="return home">';
		}
	mysql_close($conn);	
	?>
</div>
</body>
</html>
