<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<style>
	#registerTable td {
		border-radius: 5vh;
	}
	
	td.validStatus1 {
		border :5px solid #82B590; 
	}
	
	td.validStatus0 {
		border :5px solid #ff0000; 
	}

</style>
</head>

<body>
	
	<?php 
		require 'header.php'; 
		require 'actionScripts/loginValidation.php';
		include 'actionScripts/conn.php';
		$sql = "SELECT * FROM `order` WHERE customerID = ".$_SESSION['ID']." GROUP BY transactionID ORDER BY transactionID desc";
		$result = mysqli_query($con,$sql);
		function searchItem($itemID){
			include 'actionScripts/conn.php';
			$itemSQL = "SELECT * FROM `item` WHERE itemID = '".$itemID."'";
			$itemResult = mysqli_query($con,$itemSQL);
			$itemRow = mysqli_fetch_array($itemResult);
			return $itemRow;
		}
	?>
	
	<div style="margin-bottom: 15vh">
		<div class="center"><p style="margin: 5vh; font-size: 5vh">History</p></div>
	
		<table id="registerTable"  cellspacing=25 cellpadding=25>
			<?php 
				while($order = mysqli_fetch_array($result)){
					
					
					$transactionSQL = "SELECT * FROM `order` WHERE transactionID = ".$order['transactionID'];
					$transactionResult = mysqli_query($con,$transactionSQL);
					
					echo "<tr><td class='validStatus".$order['status']."'>"
						.$order['transactionID']
						."<br>"
						.$order['datetime'];
						
					while($transaction = mysqli_fetch_array($transactionResult)){
						echo "<br>";
						echo "[".$transaction['itemQuantity']."] ";
						echo searchItem($transaction['itemID'])['itemName'];
					}
						
					echo "<br>"
						.$order['total']
						." MYR</td></tr>";
				}
			?>
		
		</table>
	
	</div>
	
	<?php require 'navBar.php'; ?>
	
	
</body>
</body>
</html>