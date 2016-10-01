<?php
	session_start();
		$name=$_SESSION["username"];

// Create connection
$conn = new mysqli("localhost","root","","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn,"SELECT * FROM books");

?>

<html>
	<head>
		<title>
			BOOK LIBRARY
		</title>
		<style>
		
		body{
			background-image:url(signup.jpg);
			background-color:black;
			background-repeat:no-repeat;
			background-size:100%;
			background-attachment:fixed;
			background-position:0px -150px;
		}

		h1.block1{
			font-size: 70px;
			text-shadow: 5px 5px 5px green;
			color: yellow;		
			text-decoration: underline;
		}
		h3.block1{
			font-size:50px;
			text-shadow: 5px 5px 5px white;
			color:aqua;
		}
		
		#navmenu,ul.sub1{
			list-style-type: none;
			margin-left: 20px;
		}
		#navmenu ul.sub1 li{
			margin-left:110px;
		}
	
		#navmenu li{
			width:300px;
			text-align:center;
			position:relative;
			margin-left: 20px;
			margin-top:5px;
		}
		
		#navmenu a{
			text-decoration: none;
			font-size: 25px;
			padding: 5px;
			display:block;
			min-width:700px;
			height:30px;
			background-color: #4d5d2e;
			color: white;
			border:2px solid gray;
			border-radius: 20px;
		}

		#navmenu .sub1 input{
			width:300px;
			margin-left: 0px;
			margin-right:20px;
			margin-top: 10px;
			background-color: #1e3c3c;
			color:white;
			padding:5px;
		}
	
		#navmenu li:hover > input{
			background-color: #858585;
			margin-left: 10px;
			margin-right: 20px;
		}
		
		#navmenu li:hover,ul#navmenu li:hover input:hover {
			-webkit-transform:scale(1.1,1.1);
			moz-transform:scale(1.1,1.1);
			transform:scale(1.1,1.1);
		}
		
		#navmenu li:hover input:hover{
			background-color: #633232;
		}
		
		#navmenu ul.sub1{
			display:none;
			position:relative;
			right:5px;
		}
	
		#navmenu li:hover .sub1{
			display:block;
		}
		#navmenu li:hover ul{
			display:block;
			background-color: #cccccc;
			width:500px;
			padding: 5px;
			min-height:100px;
			margin-top:0px;
		}
		
		.sub2{
			width:20px;
		}
		</STYLE>
	</head>
	<body>
	<h1 align="center" class="block1"> <marquee> 
			WELCOME USER
			</marquee>
		</H1>
	<?php include "weluser.php"  ?>	
		
		<h3 align="center" class="block1">BOOKS</H3>
		<ul id="navmenu">
		<?php
			while($row = mysqli_fetch_array($result)) {?>
				<li><a href=""><?php echo $row['BookName']; ?> </a>
				<ul class="sub1" color="yellow">
					<form action="new_check.php"  method="post">
						<li>ISSUE DATE (DD/MM/YYYY): 
							<input type="date" ID="issue_date" name="issue_date" >
						</li>
						<li>RETURN DATE (DD/MM/YYYY): 
							<input type="date" ID="return_date" name="return_date" > 
						</li>
						<li>
							<input type="hidden" name="bookid" value=<?php echo $row['Book_id'];?> </li>
						</li>
						<LI>
							<input type="hidden" name="book_name" value=<?php echo $row['BookName']; ?>></LI>
						<LI><input type="hidden" name="name" value=<?php echo $name?> ></LI>
						<li>
							<button type="submit" name="submit">ISSUE</button>
						</li>
					</form>					
					</ul>
				</li>
			
			<?php } ?>
			</ul>
			<br />
			<br />
	</body>
</html>