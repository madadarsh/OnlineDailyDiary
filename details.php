<?php 

require 'conn.php'; 

session_start();
if (!$_SESSION['u_name'] ){
    echo '<script>window.location.href = "index.php";</script>';
}

$u_date = $_GET['u_date'];
$u_name = $_SESSION['u_name'];

$sql = "SELECT * FROM creates WHERE u_date = '$u_date' AND u_name = u_name ";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
		* {box-sizing: border-box;}

		body { 
		background-image: url(d3.jpg);
		  margin: 0;
		  word-break: break-word;
		  font-family: Arial, Helvetica, sans-serif;
		}

		.header {
		border-color: transparent white transparent transparent;
		  overflow: hidden;
		 // background-color: #f1f1f1;
		  padding: 20px 10px;
		}

		.header a {
		  float: left;
		  color: black;
		  text-align: center;
		  padding: 12px;
		  text-decoration: none;
		  font-size: 18px; 
		  line-height: 25px;
		  border-radius: 4px;
		}

		.header a.logo {
		  font-size: 25px;
		  font-weight: bold;
		}

		.header a:hover {
		  background-color: #ddd;
		  color: black;
		}

		.header a.active {
		  background-color: dodgerblue;
		  color: white;
		}

		.header-right {
		  float: right;
		}

		@media screen and (max-width: 500px) {
		  .header a {
			float: none;
			display: block;
			text-align: left;
		  }
		  
		  .header-right {
			float: none;
		  }
		}
		
		.timeline {
		  position: relative;
		  max-width: 1200px;
		  margin: 0 auto;
		}

		/* Container around content */
		.container {
		  padding: 10px 40px;
		  position: relative;
		  background-color: inherit;
		  width: 55%;
		}

		/* Place the container to the right */
		.right {
		  left: 20%;
		}

    

		/* The actual content */
		.content {
		  padding: 40px 60px;
		  background-color: #339e5d;
		  position: relative;
		  border-radius: 6px;
		}

		/* Media queries - Responsive timeline on screens less than 600px wide */
		@media screen and (max-width: 600px) {
		  /* Place the timelime to the left */
		  .timeline::after {
		  left: 31px;
		  }
			  
		  /* Full-width containers */
		  .container {
		  width: fit-content;
		  padding-left: 70px;
		  padding-right: 25px;
		  margin-bottom: 16px;
		  
		  }

			 
		}
		.button {
		  background-color: #ddd;
		  border: none;
		  color: black;
		  padding: 10px 20px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  margin: 4px 2px;
		  cursor: pointer;
		  border-radius: 16px;
		}

		.button:hover {
		  background-color: #f1f1f1;
		  font-family: Arial, Helvetica, sans-serif;
		}
	
	</style>
</head>
<body>

<nav>
<div class="header">
  <a href="#default" class="logo"> Welcome <?php echo $_SESSION['u_name']; ?></a>
  <div class="header-right">
    <a class="active" href="home.php">Home</a>
	<a href="create.php">Create New Thought</a>
    <a href="contact.php">Contact</a>
    <a href="logout.php">Log Out</a>
  </div>
</div>
</nav>

<div class="timeline">
  <div class="container right">
    <div class="content">
<?php 

if(mysqli_num_rows($result) > 0)  
{  
while($row = mysqli_fetch_array($result))                                 
{  
	if($u_name == $row["u_name"]){
	?>
<h2><br>Topic:-  <?php echo $row["u_topic"];?></h2>
<p><br>Words:- <?php echo $row["u_desc"]; ?><br></p>  
<?php  
}  
}
}

?>
<!--
<div class="timeline">
  <div class="container left">
    <div class="content">-->
      
    </div>
	<button class="button"><h4><a href="home.php">Back To Preview </a></h4></button>
  <p></p>
  </div>
  </div>
  

</body>
</html>
