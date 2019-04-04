<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reload Successful</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php require 'header.php'; ?>
	
	
	<div class="center">
	<p style="margin: 5vh; font-size: 5vh">Done!</p>
		
	<table id="registerTable" cellpadding="10vh">
		<tr>
			<td><img style="width: 35%" src="resources/icons/success.png"></td>
		</tr>
		<tr>
			<td><button id="register" onclick="location.href='home.php'">Back to home</button></td>
		</tr>
		<tr><p id="warning"></p></tr>
	</table>
		
	</form>
	
	</div>
	
	
	<?php require "navBar.php";?>
</body>
</html>