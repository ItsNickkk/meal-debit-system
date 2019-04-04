<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>reloadAction.php</title>
</head>

<body>
	<?php require 'conn.php'; 
	
	$id = $_SESSION['ID'];
	$row = mysqli_fetch_array(mysqli_query($con,'Select customerBalance from customer where customerID = '.$id));
	$newBalance =  $row['customerBalance'] + $_POST['amount'];
	$sql = "UPDATE customer SET customerBalance = ".$newBalance." WHERE customerID = '".$id."';";
	
	if(!mysqli_query($con,$sql)){
		echo '<script>location.href="../home.php"</script>';	
	} else {
		$_SESSION['balance'] = $newBalance;
		echo '<script>location.href="../reloadDone.php"</script>';
	}
	?>
	
	
	
	
	
</body>
</html>