<?php session_start(); ?>
<?php include('dbcon.php'); 
$content = '<img src="images/felly.png" class="imgleft" />'
   
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
body {
  background-image: url('images/login.jpg');
   background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body>

      
<div class="from">
<center><h3 style=font-size:3em;"> WELCOME TO PHILISTERS-MART<h3></center>
</div>

<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3><B>Login here</B></h3>
	
    <div class="form-item">
		<input type="text" name="fullname" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
	<div class="form-actions">
	<p>
	Do not have an account?
<a href="register.php">
	Create Account
	</a>
	</p>
</form>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['fullname']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			
			$query 		= mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and fullname='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					 if($_POST['fullname']=="admin"){
						header('location:home.php');
					 }
					 else{
						 header('location:users.php');
					 }
						 
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
 

</body>
</html>