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
if($_POST['submit']=='View'){
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
$qry = "SELECT * FROM Medicine";
$results = mysqli_query($link,$qry);
echo '<h1>The Medicines Details are - </h1>';

echo '<table border="1">

<th> Medicine Name </th>
<th> Description </th>
<th>Present Quantity</th>
<th> Required Quantity </th> ';
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
}
if($_POST['submit']=='Add'){
$validationFlag = true;
if(!($_POST['Name']))
{
echo 'Please enter Medicine Name';
$validationFlag = false;
}
else{
$Name = $_POST['Name'];
$Description=!empty($_POST['Description'])?$_POST['Description']:'NULL';
$Presnt_Qty=!empty($_POST['Presnt_Qty'])?$_POST['Presnt_Qty']:'NULL';
$Req_Qty=!empty($_POST['Req_Qty'])?$_POST['Req_Qty']:'NULL';
}
if($validationFlag){
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
$query = "INSERT INTO Medicine (Name, Description, Presnt_Qty,Req_Qty) VALUES ('$Name', '$Description', $Presnt_Qty,$Req_Qty)";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Medicine inserted successfully! ';
}
}
if($_POST['submit']=='Increase'){
$validationFlag = true;
if(!($_POST['Name']) || !($_POST['Update']))
{
echo 'Please enter Medicine Name and amount to be updated';
$validationFlag = false;
}
else{
$Name = $_POST['Name'];
$Update=$_POST['Update'];
}
if($validationFlag){
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
$query = "UPDATE medicine SET Presnt_Qty = Presnt_Qty + $Update WHERE Name = '$Name'";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Medicine updated successfully! ';
}
}
if($_POST['submit']=='Decrease'){
$validationFlag = true;
if(!($_POST['Name']) || !($_POST['Update']))
{
echo 'Please enter Medicine Name and amount to be updated';
$validationFlag = false;
}
else{
$Name = $_POST['Name'];
$Update=$_POST['Update'];
}
if($validationFlag){
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
$query = "UPDATE medicine SET Presnt_Qty = Presnt_Qty - $Update WHERE Name = '$Name'";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Medicine updated successfully! ';
}
}
?>
</div>
</body>
</html>