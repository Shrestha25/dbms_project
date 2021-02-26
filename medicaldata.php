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
if(!($_POST['StudentID']))
{
echo 'Please enter StudentID';
$validationFlag = false;
}
else{
$StudentID = $_POST['StudentID'];
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
$qry = "SELECT * FROM medical_data WHERE StudentID=$StudentID ";
$results = mysqli_query($link,$qry);
echo '<h1>The Student Details are - </h1>';

echo '<table border="1">

<th> StudentID </th>
<th> StudentName </th>
<th> MobileNumber </th>
<th> Sex </th>
<th> BloodGroup </th>
<th> Remarks </th> ';
while ($row = mysqli_fetch_assoc($results))
{
echo '<tr>
<td>'.$row['StudentID'].'</td>
<td>'.$row['SudentName'].'</td>
<td>'.$row['MobileNumber'].'</td>
<td>'.$row['Sex'].'</td>
<td>'.$row['BloodGroup'].'</td>
<td>'.$row['Remarks'].'</td>
</tr>';
}
echo '</table>';
}
}
if($_POST['submit']=='Add'){
$validationFlag = true;
if(!($_POST['StudentID']))
{
echo 'Please enter StudentID';
$validationFlag = false;
}
else{
$StudentID = $_POST['StudentID'];
$SudentName=!empty($_POST['SudentName'])?$_POST['SudentName']:'NULL';
$MobileNumber=!empty($_POST['MobileNumber'])?$_POST['MobileNumber']:'NULL';
$Sex=!empty($_POST['Sex'])?$_POST['Sex']:'NULL';
$BloodGroup=!empty($_POST['BloodGroup'])?$_POST['BloodGroup']:'NULL';
$Remarks=!empty($_POST['Remarks'])?$_POST['Remarks']:'NULL';
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
$query = "INSERT INTO medical_data (StudentID, SudentName, MobileNumber,Sex,BloodGroup,Remarks) VALUES ($StudentID, '$SudentName', '$MobileNumber','$Sex','$BloodGroup','$Remarks')";
$results = mysqli_query($link,$query);

if($results == FALSE) echo mysqli_error($link) . '<br>';
else echo 'Patient inserted successfully! ';
}
}
if ($_POST['submit'] == 'Update'){ 
$validationFlag = true;
if(!($_POST['StudentID']))
{
echo 'Please enter StudentID';
$validationFlag = false;
}
else{ 
$StudentID = $_POST['StudentID'];
$SudentName=!empty($_POST['SudentName'])?$_POST['SudentName']:'NULL';
$MobileNumber=!empty($_POST['MobileNumber'])?$_POST['MobileNumber']:'NULL';
$Sex=!empty($_POST['Sex'])?$_POST['Sex']:'NULL';
$BloodGroup=!empty($_POST['BloodGroup'])?$_POST['BloodGroup']:'NULL';
$Remarks=!empty($_POST['Remarks'])?$_POST['Remarks']:'NULL'; 
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
if($_POST['SudentName']){ 
$update1 = "UPDATE medical_data SET SudentName = '$SudentName' WHERE StudentID = '$StudentID'"; 
$results1 = mysqli_query($link,$update1);
if($results1 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
} 
if($_POST['MobileNumber']){ 
$update2 = "UPDATE medical_data SET MobileNumber = '$MobileNumber' WHERE StudentID = '$StudentID'"; 
$results2 = mysqli_query($link,$update2);
if($results2 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link); 
echo '<br>';
}
if($_POST['Sex']){ 
$update3 = "UPDATE medical_data SET Sex = '$Sex' WHERE StudentID = '$StudentID'"; 
$results3 = mysqli_query($link,$update3);
if($results3 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link); 
echo '<br>';
}
if($_POST['BloodGroup']){ 
$update4 = "UPDATE medical_data SET BloodGroup = '$BloodGroup' WHERE StudentID = '$StudentID'"; 
$results4 = mysqli_query($link,$update4);
if($results4 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
}
if($_POST['Remarks']){ 
$update5 = "UPDATE medical_data SET Remarks = '$Remarks' WHERE StudentID = '$StudentID'"; 
$results5 = mysqli_query($link,$update5); 
if($results5 == FALSE) echo mysql_error() . '<br>'; 
else echo mysqli_info($link);
echo '<br>';
}
} 
}
if ($_POST['submit'] == 'Delete'){ 
$validationFlag = true;
if(!($_POST['StudentID']))
{
echo 'Please enter StudentID';
$validationFlag = false;
}
else{ 
$StudentID = $_POST['StudentID']; 
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
$delete = "DELETE FROM medical_data WHERE StudentID = $StudentID";   
 
$results = mysqli_query($link,$delete); 
if($results == FALSE) echo mysqli_error($link) . '<br>'; 
else echo 'Data deleted successfully';  
}  
}  
?>
</div>
</body>
</html>