<?php session_start();
if(isset($_SESSION['idAdmin']) ){
	header('Location:./home2.php');
}
?>

<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="../logoCinema.png">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>    Admin login</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$Password = mysqli_real_escape_string($con, $_POST['pass']);
			

			$query 		= mysqli_query($con, "SELECT * FROM admin WHERE   username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);

			
			if ($num_row > 0) 
				{	
					if (password_verify($Password, $row['password'])) {
					
					$_SESSION['idAdmin']=$row['idAdmin'];
					header('location:home2.php');
				
					}	
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
 
  
</div>

</body>
</html>