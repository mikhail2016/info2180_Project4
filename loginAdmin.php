<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cheapo Mail</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/cheapo.js"></script>
</head>
<body>
<div id="homescreen">
<?php
include_once "connect.php";
$uname=$_REQUEST["uname"];
$pword=$_REQUEST["pword"];
$error=true;
$query = mysql_query("SELECT * FROM Admin");
if($query === FALSE){ 
    die(mysql_error());
	}
	while ($row = mysql_fetch_array($query)) {
		if ($uname === $row["username"] && $pword === $row["password"]) {
			session_start();
			header("Location:AdminHome.html");
			$error=true;
		}
		else{
			$error=false;
		}
	}
	if ($error===false){
		 echo ("You are not an Administrator !");
		 echo(" ");
		 echo '<input id= "home" type="button" value="return home">';
	}
mysql_close($conn);
?>  
<div id="homescreen">
</body>
</html>