<!DOCTYPE html>
<html>
	<head>
		<title>Create Deals</title>
		<link rel="icon" type="image/css" href="logome_tumb.jpg">
		<style>
			body
			{
				background-color: #000000;
				background-image: url("tile_tumb.jpg");
				background-position: center;
			}
			.topbar
			{
				background-color: #e40046;
				padding: .3%;
				width: 100%;
			}
			.labeltext
			{
				color: #e40046;
				font-family: Arial, Helvetica, sans-serif;
			}	
			input[type=text], input[type=password], input[type=number], input[type=date]
			{
				width: 45%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}
			input[type=text]:focus 
			{
				width: 100%;<!--bar width increasing while clicking-->
			}
			input[type=number]:focus 
			{
				width: 100%;<!--bar width increasing while clicking-->
			}
			<!--input[type=date]:focus -->
			{
				width: 100%;<!--bar width increasing while clicking-->
			}
			.form
			{
				background-color: rgba(0,0,0,0.8);
				width: 45%;
				float: right;
				padding: 14px 20px;
				border-style: dashed;
				border-width: 30%;
				border-color: #e40046;
			}
			button 
			{
				background-color: #e40046;
				font-size: 130%;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 30%;
			}
			.buttonsmall
			{
				background-color: #4db8ff;
				font-size: 120%;
				color: white;
				padding: 14px 14pxpx;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 20%;
			}
		</style>
		
	</head>
	<body>
		<div class="topbar">
				<img src="topbar_icon.jpg" alt="dealsaroundme_icon" width="20%" height="18%">
		</div>
		<br>
			<form action="/action_page.php" autocomplete="on">
				<div class="form">
					<div class="labeltext">
					<b>
						<label>Product name</label>
						<br><input type="text" placeholder="Item Name" name="item" required></br>
						<label>Category</label>
						<br><input type="text" placeholder="Category" name="uname" required></br>
						<label>Seller</label>
						<br><input type="text" placeholder="Seller address" name="seller" required></br>
						<label>Offer</label>
						<br><input type="text" placeholder="Deal" name="deal" required></br>
						<label>Brand</label>
						<br><input type="text" placeholder="Company" name="company" required></br>
						<label>Pay</label>
						<br><input type="number" placeholder="Amount" name="amnt" required></br>
						<br><label>Offer Validity</label></br>
						<input placeholder="From" class="labeltext" type="text" onfocus="(this.type='date')" name="datefrom" id="date"required>	
						<input placeholder="Till" class="labeltext" type="text" onfocus="(this.type='date')" name="datetill" id="date"required>
						<label>Quantity</label>
						<br><input type="number" placeholder="stock available" name="stockno" min="1" required></br>
						<input type="file" name="pic" accept="image/*"></button><!--Upload image-->
						<button type="submit" class="buttonsmall" style="float: right;">upload</button>
					</div>
					<br><center><button type="submit">Publish</button></center></br>
					<button type="button" class="buttonsmall" style="float: left;">Cancel</button>
					</b>
				</div>
			</form>
		</br>
	</body>
</html>