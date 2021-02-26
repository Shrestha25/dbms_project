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
$validationFlag = true;
if(!($_POST['DoctorID']))
{
echo 'Please enter DoctorID';
$validationFlag = false;
}
else{
$DoctorID = $_POST['DoctorID'];
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
$qry = "SELECT WorkerID,WorkerName,MobileNumber,EmailID FROM PHC_Workers WHERE WorkerID=$DoctorID";
$results = mysqli_query($link,$qry);
echo '<h1>The Doctor Details are - </h1>';

echo '<table border="1">

<th> DoctorID </th>
<th> WorkerName </th>
<th> MobileNumber </th>
<th> EmailID </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['WorkerID'].'</td>
<td>'.$row['WorkerName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['EmailID'].'</td>
</tr>';
}
echo '</table>';

$qry = "SELECT * FROM doctor WHERE DoctorID=$DoctorID";
$results = mysqli_query($link,$qry);
echo '<h1>Time and Days of working</h1>';

echo '<table border="1">

<th> Day </th>
<th> TimeIn </th>
<th> TimeOut </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['Day'].'</td>
<td>'.$row['TimeIn'].'</td>
<td>'.$row['TimeOut'].'</td>
</tr>';
}
echo '</table>';
}
}
if($_POST['submit']=='Add'){
$validationFlag = true;
if(!($_POST['DoctorID']) || !($_POST['LoginPassword']))
{
echo 'Please enter DoctorID and LoginPassword';
$validationFlag = false;
}
else{
$WorkerID = $_POST['DoctorID'];
$LoginPassword=$_POST['LoginPassword'];
$WorkerName=!empty($_POST['WorkerName'])?$_POST['WorkerName']:'NULL';
$MobileNumber=!empty($_POST['MobileNumber'])?$_POST['MobileNumber']:'NULL';
$EmailID=!empty($_POST['EmailID'])?$_POST['EmailID']:'NULL';
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
$query = "INSERT INTO phc_workers (WorkerID, LoginPassword, WorkerName, MobileNumber,EmailID) VALUES ($WorkerID, '$LoginPassword', '$WorkerName','$MobileNumber','$EmailID')";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Doctor inserted successfully! ';
}
}
if ($_POST['submit'] == 'Update'){ 
$validationFlag = true;
if(!($_POST['DoctorID']))
{
echo 'Please enter DoctorID';
$validationFlag = false;
}
else{ 
$WorkerID = $_POST['DoctorID'];
$LoginPassword=!empty($_POST['LoginPassword'])?$_POST['LoginPassword']:'NULL';
$WorkerName=!empty($_POST['WorkerName'])?$_POST['WorkerName']:'NULL';
$MobileNumber=!empty($_POST['MobileNumber'])?$_POST['MobileNumber']:'NULL';
$EmailID=!empty($_POST['EmailID'])?$_POST['EmailID']:'NULL';
}
if($validationFlag){ 
$link = mysqli_connect('localhost', 'root', '');  
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
}  
$db = mysqli_select_db($link,'phc_database'); 
if(!$db){ 
die("Unable to select database"); 
} 
if($_POST['WorkerName']){ 
$update1 = "UPDATE phc_workers SET WorkerName = '$WorkerName' WHERE WorkerID = '$WorkerID'"; 
$results1 = mysqli_query($link,$update1);
if($results1 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
} 
if($_POST['LoginPassword']){ 
$update1 = "UPDATE phc_workers SET LoginPassword = '$LoginPassword' WHERE WorkerID = '$WorkerID'"; 
$results1 = mysqli_query($link,$update1);
if($results1 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
} 
if($_POST['MobileNumber']){ 
$update1 = "UPDATE phc_workers SET MobileNumber = '$MobileNumber' WHERE WorkerID = '$WorkerID'"; 
$results1 = mysqli_query($link,$update1);
if($results1 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
}
if($_POST['EmailID']){ 
$update1 = "UPDATE phc_workers SET EmailID = '$EmailID' WHERE WorkerID = '$WorkerID'"; 
$results1 = mysqli_query($link,$update1);
if($results1 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
}  
} 
}
if ($_POST['submit'] == 'Delete'){ 
$validationFlag = true;
if(!($_POST['DoctorID']))
{
echo 'Please enter DoctorID';
$validationFlag = false;
}
else{ 
$WorkerID = $_POST['DoctorID']; 
}
if($validationFlag){
$link = mysqli_connect('localhost', 'root', ''); 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
}  
$db = mysqli_select_db($link,'phc_database'); 
if(!$db){ 
die("Unable to select database"); 
} 
$delete1 = "DELETE FROM phc_workers WHERE WorkerID = $WorkerID";   
$results1 = mysqli_query($link,$delete1);
$delete2 = "DELETE FROM doctor WHERE DoctorID = $WorkerID";   
$results2 = mysqli_query($link,$delete2); 
if($results1 == FALSE || $results2 == FALSE) echo mysqli_error($link) . '<br>'; 
else echo 'Data deleted successfully';  
}  
}
if ($_POST['submit'] == 'Insert'){ 
$validationFlag = true;
if(!($_POST['DoctorID']) || !($_POST['Day']) || !($_POST['TimeIn']) || !($_POST['TimeOut']))
{
echo 'Please enter DoctorID,day,TimeIn and TimeOut';
$validationFlag = false;
}
else{ 
$DoctorID = $_POST['DoctorID'];
$Day = $_POST['Day'];
$TimeIn = $_POST['TimeIn'];
$TimeOut = $_POST['TimeOut']; 
}
if($validationFlag){
$link = mysqli_connect('localhost', 'root', ''); 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
}  
$db = mysqli_select_db($link,'phc_database'); 
if(!$db){ 
die("Unable to select database"); 
} 
$query = "INSERT INTO doctor (Day, TimeIn, TimeOut, DoctorID) VALUES ('$Day', '$TimeIn', '$TimeOut',$DoctorID)";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Doctor inserted successfully! '; 
}  
} 
if ($_POST['submit'] == 'Remove'){ 
$validationFlag = true;
if(!($_POST['DoctorID']) || !($_POST['Day']))
{
echo 'Please enter DoctorID and Day';
$validationFlag = false;
}
else{ 
$DoctorID = $_POST['DoctorID'];
$Day = $_POST['Day']; 
}
if($validationFlag){
$link = mysqli_connect('localhost', 'root', ''); 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
}  
$db = mysqli_select_db($link,'phc_database'); 
if(!$db){ 
die("Unable to select database"); 
} 
$delete = "DELETE FROM doctor WHERE DoctorID = $DoctorID AND Day='$Day' " ;
$results = mysqli_query($link,$delete);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Doctor slot removed successfully! '; 
}  
}       
?>
</div>
</body>
</html>