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
echo '<h1>The Medicine which are less in stock - </h1>';

echo '<table border="1">
<th> Name </th>
<th> Description </th>
<th> Presnt_Qty </th>
<th> Req_Qty </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Name'].'</td>
<td>'.$row['Description'].'</td>
<td>'.$row['Presnt_Qty'].'</td>
<td>'.$row['Req_Qty'].'</td>
</tr>';
}
echo '</table>';
?>
</div>
</body>
</html>