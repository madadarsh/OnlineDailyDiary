<?php 

require 'conn.php'; 

session_start();
if (!$_SESSION['u_name'] ){
    echo '<script>window.location.href = "index.php";</script>';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

* {box-sizing: border-box;}
body {
	background-image:url("d3.jpg");
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
			
	input[type=text], select, textarea {
	  width: 100%;
	  padding: 12px;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	  margin-top: 6px;
	  margin-bottom: 16px;
	  resize: vertical;
	}

	input[type=submit] {
		background-color: #b77435d6;
		color: white;
		padding: 12px 20px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	input[type=submit]:hover {
	  background-color: #45a049;
	}

	.container {
		border-radius: 5px;
		background-color: #327c49;
		padding: 20px;
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


<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Send mail" mailto:'mad1032000@gmail.com' ">
  </form>
</div>

</body>
</html>
