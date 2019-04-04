<!DOCTYPE html>
<html>
<head>
    <title>Dishcourt</title>
	<link href="CSS/main.css" rel="stylesheet" type="text/css">
	<link href="CSS/home.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php require 'header.php'; ?>
	
    <div class='center'>
		
		<div id="balance" style="width: 100vw">
			<?php
				if(isset($_SESSION['loggedIn'])){
					echo "Hello, ".$_SESSION['username'];
				}
			?>
			<p>Remaining balance:</p>
			<p id="value" style="font-size: 15vh;">
				00.00
			</p><span style="display:inline-block; font-size: 3vh">MYR</span>
			<span style="width:100%;" class="center">
			<?php
				
				if(isset($_SESSION['loggedIn'])){
					echo '<button id="pay" onClick=redirectToPay() style="font-size: inherit">Pay now</button>';
				} else {
					echo '<button id="pay" onClick=redirectToLogin() style="font-size: inherit">Login | Register</button>';
				}
			
			?>
			
			</span>
			
			
		</div>
		<?php require "navBar.php";?>
	</div>
	
	<?php
	$value = 'value';
	if(isset($_SESSION['loggedIn'])){
		echo "<script>document.getElementById('".$value."').textContent='".$_SESSION['balance']."'</script>";
	}	
	?>
	
	
</body>
</html>