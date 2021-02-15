<?php require 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Diary SignUp</title>
        <link type="text/css" rel="stylesheet" href="logform.css">
        <link rel="stylesheet" href "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="login.js"></script>
    </head>
    <body>
    <form id="signup" name="form2" onsubmit="return check2()" action="" method="POST">
            <label><pre>Name </pre><input type="text" name="p_name" required></label>
            <br>
            <label><pre>Email </pre><input type="email" name="u_email" required></label>
            <br>
            <label><pre>Username </pre><input type="text" name="u_name" required></label>
            <br>
            <label><pre>Password </pre><input type="password" name="u_pass" minlength="8" required></label>
            <br><br>
            <input type="submit" value="Sign Up" name="u_add" required>
            <br><br>
            <a href="index.php">Already have account ?</a>
        </form>
        <?php 
        if( isset($_POST['u_add']) ){
        	$u_name = $_POST['u_name'];
        	$u_email = $_POST['u_email'];
        	$p_name = $_POST['p_name'];
        	$u_pass = $_POST['u_pass'];

        	$sql = "INSERT INTO log_dets (p_name, u_name, u_email, u_pass) VALUE ( '$p_name', '$u_name', '$u_email', '$u_pass')";

        	if (mysqli_query($conn, $sql)){
        	echo '<script>window.location.href = "index.php";</script>';
        	} else {
        		echo "Error;" . $sql . "<br>" . mysqli_error($conn);
        	}
	
 
        }

        ?>
    </body>
</html>