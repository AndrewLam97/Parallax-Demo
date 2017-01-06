<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Link Clicks</title>
</head>

<body>
<?php
/*
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/
?>

<?php


// Specify the location of the file for recording the link clicks.
//    Note: The directory with the file may need 766 or 777 permissions.

$FileLocation = '/log/LinkClicks/logs.txt';

/* No other customizations required. */
if( empty($_GET['link']) ) { exit; }
$f = fopen($_SERVER['DOCUMENT_ROOT'].$FileLocation,'a');
if( ! $f ) { exit; }
fwrite($f,date('Y-m-d H:i:s')."\t".$_SERVER['REMOTE_ADDR']."\t".$_GET['page']."\t".$_GET['link']."\n");
fclose($f);
?>

<!-- assign links this attribute to call logging-->

onmousedown="return LinkClicked(this)"

</body>
</html>