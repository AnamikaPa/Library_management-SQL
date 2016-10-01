<head>
<style>
	
table, th, td {
    border: 1px solid black;
	border-color:white;
	color:white;
	background-color:#8B4513;
}
    .logout{
         text-align:center;
         font-size:50px;
         color:red;
     }
		
		body{
			background-image:url(signup.jpg);
			background-color:black;
			background-repeat:no-repeat;
			background-size:100%;
			background-attachment:fixed;
			background-position:0px -150px;
			color:white;
			font-size:20px;
			font-weight:bold;
		}
	 .big{
			font-size:30px;
			background-color:darkblue;
			color:lightblue;
	 }
	 .big2{
			font-size:30px;
			background-color:lightblue;
			color:darkblue;
	 }
	 .div2{
		 height:40px;
		 width:40px;
		 float:right;
	 }

</style>
</head>
<body>

<h1 class="logout">WELCOME ADMIN</h1>
<form action="main.php" method="POST">
<button class="big2" onclick="main.php"  style="float:right">LOGOUT</button>
</form>
<br />
<br />
<hr />
<br />
<br />
<br />
<form action="admin4.php" method="POST">
<input type="submit" value="ADD BOOK" class="big" name="submit">
</form>

</body>
</html>




<?php 
if(isset($_POST['submit'])){
	include "bookform.php";	
}
if(isset($_POST['Submit'])){

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO books(BookName) VALUES ('$_POST[book]')";

if ($conn->query($sql) === TRUE) {
    ?><H1 align="center" id="sub1">New Book is added successfully</B></U></H1> <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<form action="admin4.php" method="POST">
<input type="submit" value="DELETE BOOK" class="big" name="SUBMIT">
</form>




<?php 
if(isset($_POST['SUBMIT'])){
	include "bookdelete.php";	
}
if(isset($_POST['SUbmit'])){

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE from books where BookName='$_POST[Book]'";

if ($conn->query($sql) === TRUE) {
    ?><H1 align="center" id="sub1">New Book is Deleted successfully</B></U></H1> <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>


<form action="admin4.php" method="POST">
<input type="submit" value="SEARCH DETAILS ABOUT ISSUED BOOK" class="big" name="SUBmit">
</form>



<?php 
if(isset($_POST['SUBmit'])){
	include "booksearch.php";	
}
if(isset($_POST['SUBMit'])){

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn,"select * from abc where BookName like '%$_POST[Book]%'");

if(mysqli_num_rows>0){
?>
<TABLE>
<tr><td align="center"><b> IssueDate</b></TD>
		<td align="center"><b> ReturnDate</b></TD>
		<td align="center"><b> BookName</b></TD>
		<td align="center"><b> UserName</b></TD></TR>
<?php
while($row = mysqli_fetch_array($result)) {
?>
		<tr><td align="center"> <?php echo $row['IssueDate'];?></TD>
		<td align="center"> <?php echo $row['ReturnDate'];?></TD>
		<td align="center"> <?php echo $row['BookName'];?></TD>
		<td align="center"> <?php echo $row['UserName'];?></TD></TR>
<?php
}
?> </table> <?php
}
else{
	?><H1 align="center" id="sub1">This book is not issued</B></U></H1> 
	<?php
}
$conn->close();
}
?>

<form float="right" action="new_report2.php" method="POST">
<input type="submit" value="Report" class="big" style="float:right">
</form>