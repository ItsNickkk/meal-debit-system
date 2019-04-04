<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>payQR.php</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<script src="resources/js/davidshimjs-qrcodejs-04f46c6/qrcode.js"></script>
</head>

<body>
	
	<?php require 'header.php'; 
	
	?>
	
	<div class="center">
	<p style="margin: 5vh; font-size: 5vh">Your QR code is:</p>
		
	<table id="registerTable" cellpadding="10vh">
		<tr>
			<td style="align-content: center"><div id="qrcode" class="center"></div></td>
			<script>
				var qr = "<?php echo $_SESSION['ID']."MYR".$_POST['amount'];?>";
				let qrCode = new QRCode('qrcode', {
					text: qr,
					colorDark: "#2c2f33",
					colorLight: "#ffffff",
					correctLevel: QRCode.CorrectLevel.H,
				});
			</script>
		</tr>
		<tr>
			<td><button id="register" onClick="location.href='home.php'">Back to home</button></td>
		</tr>
	</table>
		
	
	</div>
	
	<?php 
		require 'navBar.php'; 
	?>
	
</body>
</html>