<?php 
include('conn.php');
$barcodetemp = mysqli_real_escape_string($con,$_POST["barcode"]);
$barcode = preg_replace("/[^0-9]/", "", $barcodetemp);
if ($barcode == ""|| $barcode == null){
	return "failed";
}
$sql = "SELECT * FROM item where itemID =".$barcode;
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr><td class='del-action'><input type='checkbox' name='record' class='del-entry'></td><td class='hidden itemID'>".$barcode."</td><td>";
		echo $row['itemName'];
		echo "</td><td class='sum'>";
		echo $row['itemPrice']."MYR";
		echo "</td></tr>";
	}
}
else{
	echo "failed";
}



?>
