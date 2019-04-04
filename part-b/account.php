<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Account Info</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<?php 
		require 'header.php'; 
		require 'actionScripts/loginValidation.php';
	?>
	
	<div class="center">
		
	<p style="margin: 5vh; font-size: 5vh">Account</p>
		
	<table id="registerTable" cellpadding="10vh">
		<tr>
			<td><button id="register" onClick="location.href='accountSettings.php'">Settings</button></td>
		</tr>
		<tr>
			<td><button id="register" onClick="location.href='actionScripts/logoutAction.php'">Logout</button></td>
		</tr>
	</table>
	
	</div>
	
	<?php require 'navBar.php'; ?>
	
</body>
</html>