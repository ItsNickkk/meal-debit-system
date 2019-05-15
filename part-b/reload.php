<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reload</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<?php 
		require 'header.php'; 
		require 'actionScripts/loginValidation.php';
	?>
	
	<div class="center">
	<p style="margin: 5vh; font-size: 5vh">Reload</p>
	<form method="post" action="emulateBank.php">
		
	<table id="registerTable" cellpadding="10vh">
		<tr>
			<td><label for="amount">Amount</label><br><input type="number" name="amount" id="amount" required min="1" title="Why are you reloading something weird?"></td>
		</tr>
		<tr>
			<td><button id="register">Confirm</button></td>
		</tr>
		<tr>
			<td><p style="font-size: 2vh">Note: <br>Reloading only takes effect <br>the next time you log in.</p></td>
		</tr>
	</table>
		
	</form>
	
	</div>
	
	<?php require 'navBar.php'; ?>
	
</body>
</html>