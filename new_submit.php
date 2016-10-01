<?php
$f=0;
session_start();
if(isset($_POST['submit'])){

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$userid=$_POST['userid'];
$username =$_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM user WHERE UserId='$userid' and Name='$username' and Password='$password'");

if(mysqli_num_rows($result) == 1)
{
	$f=1;
	session_start();
	$_SESSION["username"] =$_POST["username"];
	header("Location:library book.php");
}

$conn->close();
}

if(isset($_POST['submit'])){

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$userid=$_POST['userid'];
$username =$_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM admin WHERE UserId='$userid' and Name='$username' and Password='$password'");

if(mysqli_num_rows($result) == 1)
{					
	$f=1;
	session_start();
	$matches = $str;
	header("Location:admin4.php");
}

$conn->close();
}

if($f==0)header("Location:login_wrong.php");
?>