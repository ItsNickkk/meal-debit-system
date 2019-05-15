<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Great Bank!</title>
	
<style>
	@import url('https://fonts.googleapis.com/css?family=Poppins');

	html *{
		font-family: 'Poppins', sans-serif;
	}
	
	body {
		margin: 0;
	}
	
	.center {
		display: table;
		margin: auto;
		width: 100vw;
		text-align: center;
	}
	
	input {
		width: 90vw;
		height: 3vh;
		padding: 0.5rem 0;
		border-bottom: 2px solid #d3d3d3;
		box-shadow: none;
		text-align: center;
		font-weight: bold;
		text-align: center
	}
	
	button {
		width: 50vw;
		height: 5vh;
	}
	
</style>
</head>

<body>
	
	<div id="container" class="center">
	<form method="post" action="actionScripts/reloadAction.php">
		<h1>Payment Details</h1>
		
		<input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
		Card Number: 
		<br>
		<input type="text" min="0000000000000001" pattern="[0-9]{16}" required>
		<br>
		CVV:
		<br>
		<input type="text" min="001" pattern="[0-9]{3}" required>
		<br>
		<br>
		<button>Confirm</button>
		
	</form>
	</div>
	
</body>
</html>