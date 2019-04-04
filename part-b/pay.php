<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pay</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<?php 
		require 'header.php';
		require 'actionScripts/loginValidation.php';
	?>
	
	<div class="center">
	<p style="margin: 5vh; font-size: 5vh">Pay</p>
	<form method="post" action="payQR.php">
		
	<table id="registerTable" cellpadding="10vh">
		<tr>
			<td><label for="amount">Amount</label><br><input type="text" name="amount" required></td>
		</tr>
		<tr>
			<td><button id="register">Confirm</button></td>
		</tr>
	</table>
		
	</form>
	
	</div>
	
	<?php require 'navBar.php'; ?>
	
	
	
	
</body>
</html>