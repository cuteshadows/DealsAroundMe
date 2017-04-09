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
<form action="sregister.php" method="post" enctype="multipart/form-data">
<div class="container">
	<label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required>
	
	<label><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>

	<label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phno" required>
	
	<label><b>Email id</b></label>
    <input type="text" placeholder="Enter Email id" name="email" required>
    
    <label><b>Company Name</b></label>
    <input type="text" placeholder="Enter Company Name" name="cname" required>
    
    <label><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="addr" required>
    
    <label><b>City</b></label>
    <input type="text" placeholder="Enter City" name="city" required>
    
    <label><b>State</b></label>
    <input type="text" placeholder="Enter State" name="state" required>
    
    <label><b>Postal Code</b></label>
    <input type="text" placeholder="Enter Postal Code" name="pcode" required>
	
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
	<label><b>Confirm Password</b></label>
    <input type="password" placeholder="Retype Password" name="cpsw" required>
	
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
		 $cname = $_POST['cname'];
		 $address = $_POST['addr'];
		 $city = $_POST['city'];
		 $state = $_POST['state'];
		 $pcode = $_POST['pcode'];
		 $username = $_POST['uname'];
		 $password = $_POST['psw'];
		 $cpassword = $_POST['cpsw'];
		 
		 if ($password==$cpassword)
		 {
			 $query = "select * from sellers WHERE sellername='$username'";
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
				 
				 $query = "insert into sellers(fname,lname,phone,email,companyname,address,city,state,postalcode,sellername,password,image) values('$firstname','$lastname','$phonenum','$emailid','$cname','$address','$city','$state','$pcode','$username','$password','$imagename')";
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
			 echo '<script type="text/javascript"> alert("Password and Confirm Password does not match!") </script>';
		 }
			 
	 }
?>
</body>
</html>
