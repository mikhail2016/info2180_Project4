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
 	$loguser=$_REQUEST["ussname"];
	include_once "connect.php";
	$idquery=mysql_query("SELECT id FROM User WHERE username='$loguser' ");
	while($row= mysql_fetch_array($idquery)){
		$id=$row['id'];
	}
	$idsquery= mysql_query("SELECT user_id FROM Message WHERE recipient_ids='$id' ");
	while($row= mysql_fetch_array($idsquery)){
		$senderid=$row['user_id'];
	}
	$iddsquery= mysql_query("SELECT first_name FROM User WHERE id='$senderid' ");
	while($row= mysql_fetch_array($iddsquery)){
		$senderfname=$row['first_name'];
	}
	$iddssquery= mysql_query("SELECT last_name FROM User WHERE id='$senderid' ");
	while($row= mysql_fetch_array($iddssquery)){
		$senderlname=$row['last_name'];
	}
	$squery= mysql_query("SELECT subject, body FROM Message WHERE recipient_ids='$id' ");
	while($row= mysql_fetch_array($squery))
	{
		echo "From :".$senderfname." ".$senderlname." "."Subject:".$row['subject'].""."Body:". $row['body'] ;
	}
	mysql_close($conn);	
	?>
</div>
</body>
</html>
