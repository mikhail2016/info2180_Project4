<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebCheapoMail";
// Create connection
$conn= mysql_connect($servername,$username,$password) or die (mysql_error());
mysql_select_db($dbname);
?> 