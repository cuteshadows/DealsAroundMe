<html>
	<head>
		<title>Find deals around you</title>	
		<link rel="stylesheet" type="text/css" href="style.css">
		<script>
			function check()
            {
                var searchtext = document.getElementById("txt").value;
                if(searchtext=='')
                {
                    alert('Enter string to search');
                   
                }
				else{
					document.myform.submit();
				}
            }
			function reset_table()
			{
				document.myform.submit();
			}
		</script>
	</head>
	<body>
	<?php
		error_reporting(0);
		require_once "config.php";
		$link = mysql_connect($hostname, $username,$password);
		$dbcon = mysql_select_db($dbname);
		echo "<div align='center' class='resp_code'>";
		echo "<h5><b>Find Nearby Deals</b></h5>";
		echo "<div align='center'>";
		echo "<form  method='post' action='index.php'  id='searchform' class='frms' name='myform'> 
			  <input  type='text' id='txt' name='name' autocomplete='off'> 
			  <input  type='submit' name='submit' value='Search' id='search' onclick='check();'>
			  <input  type='submit' name='reset' value='Reset' id='reset' onclick='reset_table();'> 
			</form> ";
		echo "</div>";
		echo "<div align='center'>";
		$search = $_POST["name"];
		if(isset($_POST['name']))
		{	
			echo "<table class='table'>
			<tr><th>Product Name</th>
			<th>Deal</th>	
			<th>Effective Price</th>
			<th>Valid Until</th>
			<th>Seller Name</th>
			</tr>";	    
			$qry = mysql_query('SELECT * FROM deals WHERE Sellername like "%'.$search.'%" OR Deal like "%'.$search.'%" OR ProductName like "%'.$search.'%"');
			$count = mysql_numrows($qry);
			if($count>0){
				if($qry) 
				{    
				  while($row=mysql_fetch_row($qry))   
				   {      
						$dealid = $row['DealID'];
						$sname = $row['Sellername'];
						$dname = $row['Deal'];
						$pname = $row['ProductName'];
						$eprice = $row['EffectivePrice'];
						$valid = $row['ValidUntil'];
			
						echo "<tr>
						<td id='pname'>$row[3]</td>
						<td id='dname'>$row[2]</td>
						<td id='eprice'>$row[4]</td>
						<td id='valid'>$row[5]</td>
						<td id='sname'>$row[1]</td>
						</tr>";
				   }    
				}
					else{echo "No";}
			}
			else{$op = "No Results Found";}	    
		}
		else
		{
			echo "<table class='table'>
			<tr><th>Product Name</th>
			<th>Deal</th>	
			<th>Effective Price</th>
			<th>Valid Until</th>
			<th>Seller Name</th>
			</tr>";	 
			$query = mysql_query("SELECT * FROM deals");
			while($row=mysql_fetch_array($query))
			{
				$dealid = $row['DealID'];
				$sname = $row['Sellername'];
				$dname = $row['Deal'];
				$pname = $row['ProductName'];
				$eprice = $row['EffectivePrice'];
				$valid = $row['ValidUntil'];
				
			
				echo "<tr>
				<td id='pname'>$row[3]</td>
				<td id='dname'>$row[2]</td>
				<td id='eprice'>$row[4]</td>
				<td id='valid'>$row[5]</td>
				<td id='sname'>$row[1]</td>
				</tr>";		
			}
		}
		echo "</table>";
		echo "</div>";
		echo "<div style='font-weight:bold;color:red;'>$op</div>";
	?>
	</body>
</html>


