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
<form action="medicines.php" method="post">
<table>
<tr>
<td>Name of Medicine</td>
<td><input type="text" name="Name"></td>
</tr>
<tr>
<td>Description</td>
<td><input type="text" name="Description"></td>
</tr>
<tr>
<td>Present Quantity</td>
<td><input type="number" name="Presnt_Qty"></td>
</tr>
<tr>
<td>Required Quantity</td>
<td><input type="number" name="Req_Qty"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Add"></td>
<td><input type="submit" name="submit" value="View"></td>
</tr>
<tr>
<td>Update medicine stock by</td>
<td><input type="number" name="Update"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Increase"></td>
<td><input type="submit" name="submit" value="Decrease"></td>
</tr>
</table>
</form>
</div>
</body>
</html>