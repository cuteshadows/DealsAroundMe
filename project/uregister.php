<?php
	require 'dbconfig/config.php';
?>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="login.css">
</head>
<body>

<div id="fcontainer">
<h2><center>Registeration Form</center></h2>
<form action="uregister.php" method="post" enctype="multipart/form-data">
<div class="container">
	<label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required>
	
	<label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>

	<label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phno" required>
	
	<label><b>Email id</b></label>
    <input type="text" placeholder="Enter Email id" name="email" required>
	
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
	<label><b>Confirm Password</b></label>
    <input type="password" placeholder="Retype Password" name="cpsw" required>
	<p id="error"></p>
	
	<label><b>Profile Picture</b></label><br>
	<input type="file" name="dp"><br><br>
    <button name="submit_btn" type="submit">Submit</button>
  </div>
<div class="container" style="background-color:#f1f1f1">
    <a href="login.php"><button type="button" class="back_btn">Back</button></a>
</div>
</form>
</div>
<?php
	 if(isset($_POST['submit_btn']))
	 {
		 //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
		 $firstname = $_POST['fname'];
		 $lastname = $_POST['lname'];
		 $phonenum = $_POST['phno'];
		 $emailid = $_POST['email']; 
		 $username = $_POST['uname'];
		 $password = $_POST['psw'];
		 $cpassword = $_POST['cpsw'];
		 
		 if ($password==$cpassword)
		 {
			 $query = "select * from users WHERE username='$username'";
			 $query_run = mysqli_query($con,$query);
			 
			 if(mysqli_num_rows($query_run)>0)
			 {
				 echo '<script type="text/javascript"> alert("Username not available. Try another!") </script>';
			 }
			 else
			 {
				 if ($_FILES["dp"]["size"] < 700000)
				{
					$imagename=uniqid();
					move_uploaded_file($_FILES["dp"]["tmp_name"],'uploads/'.$imagename.'.jpg');
				}
				 
				 $query = "insert into users (fname,lname,phone,email,username,password,image) values('$firstname','$lastname','$phonenum','$emailid','$username','$password','$imagename')";
				 $query_run = mysqli_query($con,$query);
				 
				 if($query_run)
				 {
					 echo '<script type="text/javascript"> alert("User Registered") </script>';
				 }
				 else
				 {
					 echo '<script type="text/javascript"> alert("Error") </script>';
				 }
			 }
		 }
		 else
		 {
			 echo '<script type="text/javascript">document.getElementById("error").innerHTML="Password Mismatch :(";
			 document.getElementById("error").style.color="RED";</script>';
		 }
			 
	 }
?>
</body>
</html>
