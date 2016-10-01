<style>
table, th, td {
    border: 1px solid black;
	border-color:white;
	color:white;
	background-color:#8B4513;
}
td{
	font-size:20px;
}

h1{
	color:white;
	text-decoration:underline;
	font-size:50px;
}
		
	body{
		background-image:url(signup.jpg);
		background-color:black;
		background-repeat:no-repeat;
		background-size:100%;
		background-attachment:fixed;
		background-position:0px -150px;
	}
	H2{
		font-size:60px;
		font-weight:bold;
		text-decoration:underline;
		color:white;
	}
	
</style>

<H2 align="center">REPORT</H2>
<?php
$f=0;
// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn,"SELECT * FROM books");
?>
<table align="center" width="50%">
	<tr>
		<td><H1 align="center" >Books Available</B></U></H1></td>
	</tr>
<?php

while($row = mysqli_fetch_array($result)) {
?>
		<tr><td align="center"> <?php echo $row['BookName']."<br />";?> </td></tr>
<?php
}
?> </table>



<?php
$result = mysqli_query($conn,"SELECT DISTINCT BookName FROM abc");
?>
<br />
<br />
<table align="center" width="50%">
	<tr>
		<td><H1 align="center" >Issued Books</B></U></H1></td>
	</tr>
<?php

while($row = mysqli_fetch_array($result)) {
?>
		<tr><td align="center"> <?php echo $row['BookName']."<br />";?> </td></tr>
<?php
}
?> </table> <?php


$result = mysqli_query($conn,"SELECT UserName,count(UserName) as count FROM abc group by UserName");
?>
<br />
<br />
<table align="center" width="50%">
	<tr>
		<td ><H1 align="center" >Info about users</B></U></H1></td>
		<td></td>
	</tr>
	<tr> 
		<td> <H3 align="center" >UserName</B></U></H3> </td>
		<td> <H3 align="center" >No. of Books</B></U></H3> </td>
	</tr>
<?php

while($row = mysqli_fetch_array($result)) {
?>
		<tr>
			<td align="center"> <?php echo $row['UserName']."<br />";?> </td>
			<td align="center"> <?php echo $row['count']."<br />";?> </td>
		</tr>
<?php
}
?> </table> <?php

$conn->close();
?>

<br />
<br />

<form  align="center" action="main.php" method="POST">
	<input type="submit" value="BACK" name="submit">
</form>