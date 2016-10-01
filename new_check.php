<style>
		
		body{
			background-image:url(signup.jpg);
			background-color:black;
			background-repeat:no-repeat;
			background-size:100%;
			background-attachment:fixed;
			background-position:0px -150px;
		}
		
		h1{
			color:white;
			font-size:50px;
		}
</style>
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
 
$issue_date=$_POST['issue_date'];
$return_date =$_POST['return_date'];
$book_name = $_POST['book_name'];
$name =$_POST['name'];
$book_id=$_POST['bookid'];

$result = mysqli_query($conn,"SELECT * FROM abc WHERE BookName='$book_name' and ((IssueDate>='$issue_date' and ReturnDate>='$issue_date') or(IssueDate<='$issue_date' and ReturnDate<='$issue_date'))");
$f=0;

if(mysqli_num_rows($result)>0){
	$f=1;
}

$g=0;
$abc = mysqli_query($conn,"SELECT * FROM abc WHERE BookName='$book_name'");
if(mysqli_num_rows($abc)==0){
	$g=1;
}

if($f==1||$g==1){
		$sql = "INSERT INTO abc (BookId,IssueDate,ReturnDate,BookName,UserName)
		VALUES ('$book_id','$issue_date','$return_date','$book_name','$name')";
	

if ($conn->query($sql) === TRUE) {
    ?><H1 align="center" >New book are added to your account successfully</B></U></H1> <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else {
	?><H1 align="center" id="sub1"><?php echo $book_name." is already issued for the time period you had entered... Try for another period..";?> </B></U></H1> <?php
}

$conn->close();
}

?>

<html>
	<form align="center" action="library book.php">
		<input type="submit" value="Back">
	</form>
</html>