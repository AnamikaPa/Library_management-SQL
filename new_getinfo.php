
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
</style>
<?php
	session_start();
	$name=$_SESSION["username"];
	$j=0;

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn,"SELECT * FROM abc WHERE UserName='$name' ");
?>
<H1 align="center" >Information about the books you had Issued</B></U></H1>

<table align="center" width='70%'>
	<tr> 
		<td > <H2 align="center" >Issued Date</B></U></H2></td>
		<td> <H2 align="center" >Returned Date </B></U></H2></td>
		<td> <H2 align="center" >BookName </B></U></H2></td>
	</tr>
<?php		
if(mysqli_num_rows($result)>0)
{	
	while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td align="center"><?php echo $row['IssueDate'];?></td>
			<td align="center"><?php echo $row['ReturnDate'];?></td>
			<td align="center"><?php echo $row['BookName'];?></td>
		</tr>
		<?php
	}
}
?>
</table>
<?php
$conn->close();

?>
<br />
<form align="center"  action="library book.php">
<button class="abc" >BACK</button>
</form>