<?php 

require 'conn.php'; 

session_start();
if (!$_SESSION['u_name'] ){
    echo '<script>window.location.href = "index.php";</script>';
}

//$u_date = $_GET['u_date'];
$u_name = $_SESSION['u_name'];
$sql = "SELECT * FROM log_dets JOIN creates ON log_dets.u_name = creates.u_name ";

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
		background-image: url("d3.jpg");
		  margin: 0;
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
		  border-radius: 10px;
		  
		}
		.sap {
		border-style: solid;
	//	border-width: 10px 30px 8px 25px;
		border-color: #339e5d;
		padding: 00px 20px;
		background-color: #d0ec4f87;
		position: relative;
		border-radius: 15px;
		padding-bottom: 15%;
		
		}
		  
		

		/* Media queries - Responsive timeline on screens less than 600px wide */
		@media screen and (max-width: 400px) {
		  /* Place the timelime to the left */
		  .timeline::after {
		  left: 31px;
		  }
			  
		  /* Full-width containers */
		  .container {
		 padding: 20px 30px;
         background-color: #339e5d;
        position: relative;
        border-radius: 10px;
        width: 100%;
		padding-left: 70px;
		padding-right: 5px;
		 object-fit: cover;
		 object-position: 5px 10%;
		  }
		  .sap {
		  width: 100%;
		  padding-left: 70px;
		  padding-right: 25px;
		  margin-bottom: 40px;
		  height: fit-content;
          width: fit-content;
          object-fit: cover;
          object-position: 5px 10%;
		  }
			 
		}
		.button {
		background-color: #caa5e6;
		border: none;
		color: black;
		padding: 10px 20px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		margin: 4px 2px;
		cursor: pointer;
		border-radius: 16px;
		text-decoration: none;
	   
		}

		.button:hover {
		  background-color: #f1f1f1;
		}
	
	</style>
</head>
<body>

<nav>
<div class="header">
  <a href="#default" class="logo"> Welcome <?php echo $_SESSION['u_name']; ?></a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
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
	?><h2><br>Your Records:--</h2>
	<?php
	
while($row = mysqli_fetch_array($result))                                 
{  
if( !$row["u_topic"]){
			 echo '<script>alert("Not yet written ");</script>';
			 echo '<script>window.location.href = "create.php";</script>';
		}
	if($u_name == $row["u_name"]){
		
	?>
	<div class="sap">
	<h2><br>Date:-  <?php echo $row["u_date"];?></h2>
	<p>Topic:- <?php echo $row["u_topic"]; ?><br></p>  
	<a href = "details.php?u_date=<?php echo $row["u_date"]; ?>" >Details </a>
	</div>	
<?php  
}  
}
}

?>
    </div>
	<button class="button"><h4><a href="create.php">Create New Thought</a></h4></button>
  <p></p>
  </div>
  </div>
  

</body>
</html>
