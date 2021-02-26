<?php 
if ($_POST['login_user'] == 'Login'){  
$WorkerID = $_POST['WorkerID']; 
$LoginPassword = $_POST['LoginPassword']; 
if($WorkerID && $LoginPassword){ 
$link = mysqli_connect('localhost', 'root', '');  
if(!$link) { 
die('Failed to connect to server: ' . mysql_error()); 
}  
$db = mysqli_select_db($link,'phc_database'); 
if(!$db) { 
die("Unable to select database"); 
} 

$qry="SELECT * FROM phc_workers WHERE WorkerID=$WorkerID AND LoginPassword = '$LoginPassword'";  
$result=mysqli_query($link,$qry);  
$count = mysqli_num_rows($result);
 
if( $count == 1){  
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_ID'] = $WorkerID; 
header('location:PHC Workers.php'); 
} 
else{ 
include('login.html'); 
echo '<center>Incorrect Username or Password !!!<center>'; 
exit(); 
} 
} 
else{ 
include('login.html'); 
echo '<center>Username or Password missing!!</center>'; 
exit(); 
} 
} 
else{ 
header("location: logcheck.php"); 
exit(); 
} 
?>
