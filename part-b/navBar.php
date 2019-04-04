<!--<?php session_start(); ?>-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>navBar.php</title>
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<link href="CSS/navBar.css" rel="stylesheet" type="text/css">

	
</head>

<body>
	<nav>
		<table id="navTable">
		
			<tr>
				
<!--				<td class="navLink"><button class="navButton" onclick="location.href='pay.php'">Pay</button></td>-->
					<td class="navLink"><button id="navPay" class="navButton" onclick=redirectToPay()>Pay</button></td>
					<td class="navLink"><button id="navReload" class="navButton" onclick=redirectToReload()>Reload</button></td>
					<td class="navLink"><button id="navCheck" class="navButton" onclick=redirectToCheck()>Check History</button></td>
				
					<?php
					
						if(isset($_SESSION['loggedIn'])){
							echo '<td class="navLink"><button id="navAcc" class="navButton" onclick=redirectToAcc()>Account Info</button></td>';
						} else {
							echo '<td class="navLink"><button id="navLogin" class="navButton" onclick=redirectToLogin()>Login | Register</button></td>';
						}
					
					?>
					
					
			
			</tr>
		
		</table>
		
		
	</nav>
	
	<script>
		function redirectToLogin(){
			location.href='loginRegister.php';
		}
		
		function redirectToAcc(){
			location.href='account.php';
		}
		
		function redirectToReload(){
			location.href='reload.php';
		}
		
		function redirectToCheck(){
			location.href='check.php';
		}
		
		function redirectToPay(){
			location.href='pay.php';
		}
		
		function isNumeric(str){
			return isNaN(str);
		}
		
		var path = window.location.pathname;
		
		if(path == '/meal-debit-system/pay.php'){
			document.getElementById("navPay").id = 'active';
		} else if (path == '/meal-debit-system/reload.php' || path == '/meal-debit-system/reloadDone.php') {
			document.getElementById("navReload").id = 'active';
		} else if (path == '/meal-debit-system/check.php') {
			document.getElementById("navCheck").id = 'active';
		} else if (path == '/meal-debit-system/account.php') {
			document.getElementById("navAcc").id = 'active';
		} else if (path == '/meal-debit-system/loginRegister.php' || path == '/meal-debit-system/login.php' || path == '/meal-debit-system/register.php') {
			document.getElementById("navLogin").id = 'active';
		}
		
	</script>
	
</body>
</html>