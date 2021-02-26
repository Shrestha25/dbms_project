<!DOCTYPE html>
<html>
<head>
<title>PHC Workers</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
body{
   
}
</style>
</head>
<body>
<div>
<img src="img/logo.jpeg" width=100%>
</div>
<?php  
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1) require('menu.php');
else{ 
header('location:login.html');
exit(); 
} 
?>
<br>
<br>
<div class="box1">
<br>

<br>
<table>
<tr><td><a href="viewpatient.php">View and add  Patient</a></td><td><a href="viewmedicaldata.php">View,add and update Medical Data</a></tr>
<tr><td><a href="viewmedicines.php">View,add and update Medicines</a></td><td><a href="medicineinstock.php">Medicines not in stock</a></td></tr>
<tr><td><a href="viewdoctor.php">View,add and update Doctors</a></td><td><a href="viewcompounder.php">View,add and update Compounders</a></td></tr>
</table>
<?php
$link = new mysqli('localhost', 'root', '');
if(!$link)
{
die('Failed to connect to server: ' . mysqli_connect_error());
}
$db = mysqli_select_db($link,'phc_database');
if(!$db)
{
 die("Unable to select database");
}
$qry = "SELECT * FROM Medicine WHERE Presnt_Qty<=0.2*Req_Qty";
$results = mysqli_query($link,$qry);
$count = mysqli_num_rows($results);
if($count) echo '<h2 class="warning">'.$count .' medicines are not in Stock</h2>';
else echo '<h2 class="calm">Presently all medicines are in stock</h2>';
?>
<br>
</div>
</body>
</html>