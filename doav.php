<!DOCTYPE html>
<html>
<head>
<title>PHC Home</title>
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
<div class="box1">
<?php
if($_POST['find']=='Find'){
$validationFlag = true;
if(($_POST['Day']=='none') && !($_POST['ID']) && !($_POST['Name']))
{
echo 'Please select any day or ID and name';
$validationFlag = false;
}
else{
$Day = $_POST['Day'];
$ID =!empty($_POST['ID'])?$_POST['ID']:'NULL';
$Name=!empty($_POST['Name'])?$_POST['Name']:'NULL';
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
if($ID=='NULL' && $Name=='NULL'){
$qry = "SELECT Day,TimeIn,TimeOut,DoctorID,WorkerName,MobileNumber,EmailID FROM Doctor,PHC_Workers WHERE DoctorID=WorkerID AND Day='$Day'";
$results = mysqli_query($link,$qry);
echo '<h1>The Doctor Details are - </h1>';

echo '<table border="1">

<th> Day </th>
<th> TimeIn </th>
<th> TimeOut </th>
<th> DoctorID </th>
<th> WorkerName </th>
<th> MobileNumber </th>
<th> EmailID </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Day'].'</td>
<td>'.$row['TimeIn'].'</td>
<td>'.$row['TimeOut'].'</td>
<td>'.$row['DoctorID'].'</td>
<td>'.$row['WorkerName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['EmailID'].'</td>
</tr>';
}
echo '</table>';
}
if($Day=='none' && $Name=='NULL'){
$qry = "SELECT Day,TimeIn,TimeOut,DoctorID,WorkerName,MobileNumber,EmailID FROM Doctor,PHC_Workers WHERE DoctorID=WorkerID AND DoctorID='$ID'";
$results = mysqli_query($link,$qry);
echo '<h1>The Doctor Details are - </h1>';

echo '<table border="1">

<th> Day </th>
<th> TimeIn </th>
<th> TimeOut </th>
<th> DoctorID </th>
<th> WorkerName </th>
<th> MobileNumber </th>
<th> EmailID </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Day'].'</td>
<td>'.$row['TimeIn'].'</td>
<td>'.$row['TimeOut'].'</td>
<td>'.$row['DoctorID'].'</td>
<td>'.$row['WorkerName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['EmailID'].'</td>
</tr>';
}
echo '</table>';
}
if($Day=='none' && $ID=='NULL'){
$qry = "SELECT Day,TimeIn,TimeOut,DoctorID,WorkerName,MobileNumber,EmailID FROM Doctor,PHC_Workers WHERE DoctorID=WorkerID AND WorkerName='$Name'";
$results = mysqli_query($link,$qry);
echo '<h1>The Doctor Details are - </h1>';

echo '<table border="1">

<th> Day </th>
<th> TimeIn </th>
<th> TimeOut </th>
<th> DoctorID </th>
<th> WorkerName </th>
<th> MobileNumber </th>
<th> EmailID </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Day'].'</td>
<td>'.$row['TimeIn'].'</td>
<td>'.$row['TimeOut'].'</td>
<td>'.$row['DoctorID'].'</td>
<td>'.$row['WorkerName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['EmailID'].'</td>
</tr>';
}
echo '</table>';
}
if($ID!='NULL' && $Day!='none'){
$qry = "SELECT Day,TimeIn,TimeOut,DoctorID,WorkerName,MobileNumber,EmailID FROM Doctor,PHC_Workers WHERE DoctorID=WorkerID AND DoctorID='$ID' AND Day='$Day'";
$results = mysqli_query($link,$qry);
echo '<h1>The Doctor Details are - </h1>';

echo '<table border="1">

<th> Day </th>
<th> TimeIn </th>
<th> TimeOut </th>
<th> DoctorID </th>
<th> WorkerName </th>
<th> MobileNumber </th>
<th> EmailID </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Day'].'</td>
<td>'.$row['TimeIn'].'</td>
<td>'.$row['TimeOut'].'</td>
<td>'.$row['DoctorID'].'</td>
<td>'.$row['WorkerName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['EmailID'].'</td>
</tr>';
}
echo '</table>';
}
if($Name!='NULL' && $Day!='none'){
$qry = "SELECT Day,TimeIn,TimeOut,DoctorID,WorkerName,MobileNumber,EmailID FROM Doctor,PHC_Workers WHERE DoctorID=WorkerID AND WorkerName='$Name' AND Day='$Day'";
$results = mysqli_query($link,$qry);
echo '<h1>The Doctor Details are - </h1>';

echo '<table border="1">

<th> Day </th>
<th> TimeIn </th>
<th> TimeOut </th>
<th> DoctorID </th>
<th> WorkerName </th>
<th> MobileNumber </th>
<th> EmailID </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Day'].'</td>
<td>'.$row['TimeIn'].'</td>
<td>'.$row['TimeOut'].'</td>
<td>'.$row['DoctorID'].'</td>
<td>'.$row['WorkerName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['EmailID'].'</td>
</tr>';
}
echo '</table>';
}
}
}
?>
</div>
</body>
</html>