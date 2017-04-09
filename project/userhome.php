<?php
	session_start();
?>
<html>
<head>
<title>User Home</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<form action="userhome.php" method="post">
<div class="container">
	<h1><center>HomePage</center></h1>
	<h2>Welcome
	<?php
		echo $_SESSION['username'];
	?>
	</h2>
	</div>
	<br><br><br><br><br><br><br><br>
	<div class="container" style="background-color:#f1f1f1">
    <button name="logout_btn" type="submit" class="cancelbtn">Logout</button>
	</div>
	
	<?php
		if(isset($_POST['logout_btn']))
		{
			session_destroy();
			header('location:login.php');
		}
	?>
</form>
</body>
</html>