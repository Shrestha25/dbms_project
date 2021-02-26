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
<form action="patient.php" method="post">
<table>
<tr>
<td>PatientID</td>
<td><input type="number" name="PatientID" ></td>
</tr>
<tr>
<td>Date</td>
<td><input type="date" name="Date"></td>
</tr>
<tr>
<td>Problem</td>
<td><input type="text" name="Problem"></td>
</tr>
<tr>
<td>TreatmentRecord</td>
<td><input type="text" name="TreatmentRecord" ></td>
</tr>
<tr>
<td>DoctorID</td>
<td><input type="number" name="DoctorID" ></td>
</tr>
<tr>
<td>Medicine</td>
<td><input type="text" name="Medicine" ></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Add"></td>
<td><input type="submit" name="submit" value="View"></td>
<tr>
</table>
</form>
</div>
</body>
</html>