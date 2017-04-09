<?php
	session_start();
	require 'dbconfig/config.php';
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>
<body>


<div id="fcontainer">
<h2><center>Login Form</center></h2>
<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="dp.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
	
	<b>Login As:</b>
	<input type="radio" name="role" value="user" checked> <b>User</b>
    <input type="radio" name="role" value="seller"> <b>Seller</b><br>
        
    <button name="submit_btn" type="submit">Login</button>
	<a href="option.php"><button type="button" id="reg_btn">Register</button></a>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
<?php
	if(isset($_POST['submit_btn']))
	{
		$username = $_POST['uname'];
		$password = $_POST['psw'];
		$role = $_POST['role'];

		if($role=='user')
		$query = "select * from users WHERE username='$username' AND password='$password'";
		else
		$query = "select * from sellers WHERE sellername='$username' AND password='$password'";
			 $query_run = mysqli_query($con,$query);	 
			 if(mysqli_num_rows($query_run)>0)
			 {
				 //valid
				 $_SESSION['username'] = $username;
				 header('location:userhome.php');
			 }
			 else
			 {
				 //Invalid
				 echo '<script type="text/javascript"> alert("Invalid User!") </script>';
			 }
	}
?>
</div>
</body>
</html>
