<html>
	<head>
		<title>
			DATA FORM1
		</title>
		<style>
		.error{
			color:red;
		}
		body{
			background-image:url(signup.jpg);
			background-color:brown;
			background-repeat:no-repeat;
			background-size:100%;
			background-attachment:fixed;
			background-position:0px -150px;
		}
		.sub2{
			background-color:grey;
			color:white;
			padding:10px;
			padding-left:150px;
			padding-right:auto;
			margin-left:300px;
			margin-right:300px;
			border-width:5px;
			border-color:white;
		}
		#sub1{
			
			color:white;
			margin-left:auto;
			margin-right:auto;
		}
		</style>
	</head>

	<script type="text/javascript">
		function validateForm() {
			var re=/^[\w ]+$/;
    		var x = document.getElementById("A").value;
   			if (x == null || x == "") {
        		alert("USER_NAME must be filled out");
        		return false;
   			}
			if(!re.test(x))
			{
				alert("Error:USER_NAME contains INVALID characters");
				return false;
			}
			
			
   			var y = document.getElementById("B").value;
        	if(y == null || y == ""){
        		alert("PASSWORD is must");
        		return false;
        	}
			
        	var a = document.getElementById("D").value;
        	if(a== null || a=="" ){
        		alert("Entering USER_ID is must");
        		return false;
        	}
			
		}
	</script>

	<body>
		<H1 align="center" id="sub1"><B><U>SIGN UP PAGE</B></U></H1>
		<p  align="center" id="sub1"><b>The field with ' <span class="error">*</span> ' mark is reqired</b></p>
		<form name="myForm" action="Q7.php" onsubmit="return validateForm()" method="post">
			<div class="sub2" >
			<TABLE  width="50%">
				<tr>
					<td>USER_ID<span class="error">*</span></td>
					<td>
						: <input type="text" name="userid" id="A"/> </td>
				</tr>
				<TR>
					<TD>USER_NAME<span class="error">*</span></TD>
					<TD width="200">: <input type="text" name="name" id="B"/></TD>
				</TR>
				<tr>
					<td>PASSWORD<span class="error">*</span> </td>
					<td>
						: <input type="password" name="password" id="C"/>
					</td>
				</tr>
				
			</table>
			<p align="center">
				<input type="submit"value="Submit" name="submit" />
				<input type="reset" value="Reset" />
			</p>
			</div>
		</form>


<?php
	
if(isset($_POST['submit'])){

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO user(UserId,Name,Password)
VALUES ('$_POST[userid]', '$_POST[name]','$_POST[password]')";

if ($conn->query($sql) === TRUE) {
    ?><H1 align="center" id="sub1">You successfully logged in.. :)</B></U></H1> <?php
	session_start();
	$_SESSION["username"] =$_POST["name"];
} else {
    ?><H1 align="center" id="sub1">You already have an account</B></U></H1> <?php
	session_start();
	$_SESSION["username"] =$_POST["name"];
}

$conn->close();
}

if(isset($_POST['submit'])){
	?>
	<form align="center" action="library book.php">
		<input type="submit" value="Carry On"/>
	</form>
	
<?php } ?>
	</body>
</html>
