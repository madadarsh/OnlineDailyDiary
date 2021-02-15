<?php 

require 'conn.php'; 

session_start();

if (!$_SESSION['u_name'] ){
    echo '<script>window.location.href = "index.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Create Page</title>
        <link type="text/css" rel="stylesheet" href="create.css">
        <link rel="stylesheet" href "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="login.js"></script>
	<style>
	
	</style>
    </head>
<body>
<div class="header">
  <a href="#default" class="logo"> The <?php echo $_SESSION['u_name']; ?></a>
  <div class="header-right">
    <a class="active" href="home.php">Home</a>
	<a href="contact.php">Contact</a>
    <a href="logout.php">Log Out</a>
  </div>
</div>


<form action="" method="POST" >
<table>
<tr>
<th colspan="2" style="font-size:larger">Create Your Thought</th>
</tr>
<tr>
<td>Username:  </td>
<td><input type="text" name="u_name" required></td>
</tr>
<tr>
<td>Date:  </td>
<td><input type="text" name="u_date" minlength="7" maxlength="10" required></td>
</tr>
<tr>
<td>Topic :  </td>
<td><input type="text" name="u_topic" required></td>
</tr>
<tr>
<td>Your Words to say:  </td>
<td> <textarea rows="7" cols="50" name="u_desc" required></textarea></td>
</tr>
<tr>
<th colspan="2" style="padding-top:1%">
<input type="submit" name="u_sub" value="Capture your Thought" required>
</th>
</tr>
</table>
</form>
<?php

if( isset($_POST['u_sub']) ){


$u_name = $_POST['u_name'];
$u_date = $_POST['u_date'];
$u_topic = $_POST['u_topic'];
$u_desc = $_POST['u_desc'];

// Check connection

$sql = "INSERT INTO creates (u_name, u_date, u_topic, u_desc) VALUES ( '$u_name', '$u_date', '$u_topic', '$u_desc')";
if( $u_name != $_SESSION['u_name'] ){
        
		echo '<script>alert("Enter your valid user name");</script>';
        die();
    
}

if (mysqli_query($conn, $sql)){
	if( $u_name == $_SESSION['u_name'] ){
     echo '<script>window.location.href = "home.php";</script>';
	}

}

}
?>




</body>
</html>