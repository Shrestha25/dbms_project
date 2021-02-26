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
if(!($_POST['PatientID']))
{
echo 'Please select any Patient';
$validationFlag = false;
}
else{
$PatientID = $_POST['PatientID'];
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
$qry = "SELECT * FROM patient_visit WHERE PatientID=$PatientID ";
$results = mysqli_query($link,$qry);
echo '<h1>The Patient Details are - </h1>';

echo '<table border="1">

<th> PatientID </th>
<th> Date </th>
<th> Problem </th>
<th> TreatmentRecord </th>
<th> DoctorID </th>
<th> Medicine </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['PatientID'].'</td>
<td>'.$row['Date'].'</td>
<td>'.$row['Problem'].'</td>
<td>'.$row['TreatmentRecord'].'</td>
<td>'.$row['DoctorID'].'</td>
<td>'.$row['Medicine'].'</td>
</tr>';
}
echo '</table>';
}
}
if($_POST['submit']=='Add'){
$validationFlag = true;
if(!($_POST['PatientID']) || !($_POST['Date']))
{
echo 'Please enter PatientID and Date';
$validationFlag = false;
}
else{
$PatientID = $_POST['PatientID'];
$Date=$_POST['Date'];
$Problem=!empty($_POST['Problem'])?$_POST['Problem']:'NULL';
$TreatmentRecord=!empty($_POST['TreatmentRecord'])?$_POST['TreatmentRecord']:'NULL';
$DoctorID=!empty($_POST['DoctorID'])?$_POST['DoctorID']:'NULL';
$Medicine=!empty($_POST['Medicine'])?$_POST['Medicine']:'NULL';
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
$query = "INSERT INTO patient_visit (PatientID, Date, Problem,TreatmentRecord,DoctorID,Medicine) VALUES ($PatientID, '$Date', '$Problem','$TreatmentRecord',$DoctorID,'$Medicine')";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Patient inserted successfully! ';
}
}
?>
</div>
</body>
</html>