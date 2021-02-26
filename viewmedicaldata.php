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
<form action="medicaldata.php" method="post">
<table>
<tr>
<td>StudentID</td>
<td><input type="number" name="StudentID" ></td>
</tr>
<tr>
<td>StudentName</td>
<td><input type="text" name="SudentName"></td>
</tr>
<tr>
<td>MobileNumber</td>
<td><input type="text" name="MobileNumber"></td>
</tr>
<tr>
<td>Sex</td>
<td><input type="text" name="Sex"></td>
</tr>
<tr>
<td>BloodGroup</td>
<td><input type="text" name="BloodGroup"></td>
</tr>
<tr>
<td>Remarks</td>
<td><input type="text" name="Remarks"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Add"></td>
<td><input type="submit" name="submit" value="View"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
<td><input type="submit" name="submit" value="Delete"></td>
</tr>
</table>
</form>
</div>
</body>
</html>