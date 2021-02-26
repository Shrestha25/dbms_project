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
<form action="compounder.php" method="post">
<table>
<tr>
<td>Compounder Id</td>
<td><input type="number" name="CompounderID" ></td>
</tr>
<tr>
<td>LoginPassword</td>
<td><input type="password" name="LoginPassword"></td>
</tr>
<tr>
<td>Compounder Name</td>
<td><input type="text" name="WorkerName"></td>
</tr>
<tr>
<td>MobileNumber</td>
<td><input type="text" name="MobileNumber"></td>
</tr>
<tr>
<td>EmailID</td>
<td><input type="text" name="EmailID"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Add"></td>
<td><input type="submit" name="submit" value="View"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Update"></td>
<td><input type="submit" name="submit" value="Delete"></td>
</tr>
<tr>
<td>Select Day</td>
       <td><select type="text" name="Day">
       <option> Mon
       <option> Tue
       <option> Wed
       <option> Thu
       <option> Fri
       <option> Sat
       <option> Sun
       </select></td>
</tr>
<tr>
<td>TimeIn</td>
<td><input type="time" name="TimeIn"></td>
</tr>
<tr>
<td>TimeOut</td>
<td><input type="time" name="TimeOut"></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Insert"></td>
<td><input type="submit" name="submit" value="Remove"></td>
</tr>
</table>
</form>
</div>
</body>
</html>