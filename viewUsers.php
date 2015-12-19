<!DOCTYPE html>
<html>
<head>
    <title>Cheapo Mail</title>
    <link rel="stylesheet" type="text/css" href="styles/cheapo.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<?php
include_once "connect.php";
$query = mysql_query(" SELECT first_name,last_name,id, username FROM User");
echo "<div class="."users".">This is in order of id, first name, last name and username";
while($row= mysql_fetch_array($query))
{
	echo "<div class="."users".">".$row['id']." ".$row['first_name']." ".$row['last_name']." ".$row['username']."</div>";
}
mysql_close($conn);	
?>
</body>
</html>
