<?php

include 'conn.php'; 

session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Diary Login</title>
        <link type="text/css" rel="stylesheet" href="logform.css">
        <link rel="stylesheet" href "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="login.js"></script>
    </head>
    <body>
        <form name="form1" onsubmit="return check()" method="POST">
            <!-- <h1>Login</h1> -->
            <label><pre>Username</pre><input type="text" name="u_name" required></label>
            <br><br>
            <label><pre>Password</pre><input type="password" name="u_pass" minlength="8" required></label>
            <br><br>
            <input type="submit" value="Login" id="login" name="u_log">
            <br><br>
            <a href="signup.php">Don't have account ?</a>
        </form>
		<?php 
        if(isset($_POST['u_log']) ){
    	$u_name = $_POST['u_name'];
    	$u_pass = $_POST['u_pass'];
    
    	$sql = "SELECT * FROM log_dets WHERE u_name = '$u_name' ";
    	$result = mysqli_query($conn, $sql);
    	
    	if (mysqli_num_rows($result) > 0){
    	    while($user = mysqli_fetch_assoc($result)){
    	   if( $u_name == $user['u_name'] && $u_pass == $user['u_pass'] ){
    	       $_SESSION['u_name'] = $u_name;
    	       echo '<script>window.location.href = "home.php";</script>';
    	        } else{
    	            echo '<script>alert("Enter your valid user name");</script>';
    	        }
    	        
    	    }
    	}
        }
    ?>
    
    </body>
</html>