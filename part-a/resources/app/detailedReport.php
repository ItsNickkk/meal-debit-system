<!DOCTYPE html>
<html>
<head>
	<title>Printable Report</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
	<script type="text/javascript" src="JS/Validation.js"></script>
	<script type="text/javascript" src="JS/closemaxmin.js"></script>
	<script type="text/javascript" src="JS/someFunction.js"></script>
	<script src="JS/jquery-3.3.1.min.js"></script>
	<script src="JS/jquery.sumtr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
	<script>if (window.module) module = window.module;</script>	
	<style>
		html *{
			color: black;
		}

		h1{
			text-align: center;
		}

		table{
			border-collapse: collapse;
		}

		td{
			border: 1px solid black;
			text-align: center;
		}

		th{
			border: 1px solid black;
			text-align: center;
		}

		.left{
			text-align: left;
		}

		.right{
			text-align: right;
		}

	</style>
	<script>
		$(document).ready(function(){
			$('#itemsold').sumtr({
				readValue : function(e) { return parseFloat(e.html().replace(/[^0-9\.]+/g, "")); },
				formatValue : function(val) { return  val + 'MYR'; },
			});

			$('#transaction-table').sumtr({
				readValue : function(e) { return parseFloat(e.html().replace(/[^0-9\.]+/g, "")); },
				formatValue : function(val) { return  val + 'MYR'; },
			});
		});

	</script>
<?php
if(isset($_POST['month'])){
	$month = $_POST['month'];
}
else{
	$month = 3;
}

$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F');

include ('phpscript/conn.php');
$sqltx = "SELECT total from `order` where month(datetime) =".$month." and status = 1 group by transactionID";
$resulttx = mysqli_query($con, $sqltx);
$sum = 0;
$count = 0;
while($rowstx = mysqli_fetch_array($resulttx)){
	$count = $count + 1;			//Total Transaction this month
	$sum = $sum+$rowstx['total'];	//Total Item Sold
}
$sqlcount = "SELECT itemQuantity from `order` where month(datetime) =".$month."  and status = 1";
$resultcount = mysqli_query($con, $sqlcount);
$itemsold = 0;
while($rowscount = mysqli_fetch_array($resultcount)){
	$itemsold = $itemsold+$rowscount['itemQuantity']; //Total Item Sold
}

$sqlcancelled = "SELECT total from `order` where month(datetime) =".$month." and status = 0 group by transactionID";
$resultcancelled = mysqli_query($con, $sqlcancelled);
$cancelled = 0;
while($rowscancelled = mysqli_fetch_array($resultcancelled)){
	$cancelled = $cancelled +1;
}

function bestSell(){
	global $month, $con;
	$sqlbestsell="SELECT `order`.itemID, item.itemName, sum(itemQuantity) as total from `order` right join item on `order`.itemID = item.itemID where `order`.status='1' and  month(datetime) = ".$month." group by itemID order by total desc limit 10";
	$resultbestsell=mysqli_query($con, $sqlbestsell);
	while($rowsbestsell=mysqli_fetch_array($resultbestsell)){
		$itemID = $rowsbestsell['itemID'];
		$itemName = $rowsbestsell['itemName'];
		$total = $rowsbestsell['total'];
		echo "<tr><td class='left'>";
		echo $itemID;
		echo "</td>";

		echo "<td class='left'>";
		echo $itemName;
		echo "</td>";

		echo "<td>";
		echo $total;
		echo "</td></tr>";
	}
}

function bestType(){
	global $month, $con;
	$sqlbesttype="SELECT item.itemType, sum(`order`.itemQuantity) as total FROM `order` RIGHT JOIN item on `order`.itemID = item.itemID where `order`.status='1' and month(datetime) = ".$month." group by item.itemType order by total desc limit 10";
	$resultbesttype=mysqli_query($con, $sqlbesttype);
	while($rowsbesttype=mysqli_fetch_array($resultbesttype)){
		$itemType = $rowsbesttype['itemType'];
		$total = $rowsbesttype['total'];
		echo "<tr><td class='left'>";
		echo $itemType;
		echo "</td>";

		echo "<td>";
		echo $total;
		echo "</td></tr>";
	}
}

function salesThisMonth(){
	global $month, $con;
	$sql = "SELECT transactionID, itemName, itemQuantity, customerUsername, datetime, total from `order` o JOIN Customer c ON o.customerID = c.customerID JOIN item i ON o.itemID = i.itemID where month(datetime) = ".$month." and o.status = '1' group by transactionID order by transactionID desc ";
	$result = mysqli_query($con, $sql);

	while($rows = mysqli_fetch_array($result)){
		$txid = $rows['transactionID'];
		$customerName = $rows['customerUsername'];
		$datetime = $rows['datetime'];
		$total = $rows['total'];
		echo "<tr>";
		echo "<td class='left'>".$txid."</td>";
		echo "<td class='left'>";
		$sql2 = "SELECT itemName from `order` o JOIN Customer c ON o.customerID = c.customerID JOIN item i ON o.itemID = i.itemID where month(datetime) = ".$month." and transactionID = ".$txid."  order by transactionID desc ";
		$result2 = mysqli_query($con, $sql2);
		while($rows2 = mysqli_fetch_array($result2)){
			echo $rows2['itemName']."<br>";
		}
		echo "</td>";
		echo "<td>";
		$sql2 = "SELECT itemQuantity from `order` o JOIN Customer c ON o.customerID = c.customerID JOIN item i ON o.itemID = i.itemID where month(datetime) = ".$month." and transactionID = ".$txid."  order by transactionID desc ";
		$result2 = mysqli_query($con, $sql2);
		while($rows2 = mysqli_fetch_array($result2)){
			echo $rows2['itemQuantity']."<br>";
		}
		echo "</td>";
		echo "<td>".$customerName."</td>";
		echo "<td>".$datetime."</td>";
		echo "<td class='right sum'>".$total." MYR</td>";
		echo "</tr>";
	}
}

function totalItemSold(){
	global $month, $con;
	$sql = "SELECT itemName, o.itemID, itemPrice, itemQuantity FROM `ORDER` o JOIN item i on o.itemID = i.itemID where month(datetime) = ".$month." and o.status = 1 group by itemID order by itemID";
	$result = mysqli_query($con,$sql);
	while($rows = mysqli_fetch_array($result)){
		$itemQuantity = 0;
		$itemid = $rows['itemID'];
		$itemname = $rows['itemName'];
		$itemprice = $rows['itemPrice'];
		echo "<tr>";
		echo "<td class='left'>";
		echo $itemid;
		echo "</td>";
		echo "<td class='left'>";
		echo $itemname;
		echo "</td>";
		echo "<td class='right'>";
		echo $itemprice." MYR";
		echo "</td>";

		$sql2 = "SELECT o.itemID, itemName,itemPrice , itemQuantity FROM `ORDER` o JOIN item i on o.itemID = i.itemID where month(datetime) = ".$month." and o.status = 1 and i.itemID =".$itemid;
		$result2 = mysqli_query($con,$sql2);
		while($rows2 = mysqli_fetch_array($result2)){
			$itemQuantity =  $itemQuantity+$rows2['itemQuantity'];

		}
		echo "<td>";
		echo $itemQuantity;
		echo "</td>";

		echo "<td class='right sum'>";
		echo $itemQuantity*$itemprice." MYR";
		echo "</td>";
		
	}
}

function cancelledThisMonth(){
	global $month, $con;
	$sql = "SELECT transactionID, itemName, itemQuantity, customerUsername, total, remark from `order` o JOIN Customer c ON o.customerID = c.customerID JOIN item i ON o.itemID = i.itemID where month(datetime) = ".$month." and o.status = '0' group by transactionID order by transactionID desc ";
	$result = mysqli_query($con, $sql);

	while($rows = mysqli_fetch_array($result)){
		$txid = $rows['transactionID'];
		$customerName = $rows['customerUsername'];
		$remark = $rows['remark'];
		$total = $rows['total'];
		echo "<tr>";
		echo "<td class='left'>".$txid."</td>";
		echo "<td class='left'>";
		$sql2 = "SELECT itemName from `order` o JOIN Customer c ON o.customerID = c.customerID JOIN item i ON o.itemID = i.itemID where month(datetime) = ".$month." and transactionID = ".$txid."  order by transactionID desc ";
		$result2 = mysqli_query($con, $sql2);
		while($rows2 = mysqli_fetch_array($result2)){
			echo $rows2['itemName']."<br>";
		}
		echo "</td>";
		echo "<td>";
		$sql2 = "SELECT itemQuantity from `order` o JOIN Customer c ON o.customerID = c.customerID JOIN item i ON o.itemID = i.itemID where month(datetime) = ".$month." and transactionID = ".$txid."  order by transactionID desc ";
		$result2 = mysqli_query($con, $sql2);
		while($rows2 = mysqli_fetch_array($result2)){
			echo $rows2['itemQuantity']."<br>";
		}
		echo "</td>";
		echo "<td>".$customerName."</td>";
		echo "<td class='right' style='white-space: nowrap'>".$total." MYR</td>";
		echo "<td class='left'>".$remark."</td>";
		echo "</tr>";
	}
}


?>
</head>
<button style="float: right;margin-top: 30px; margin-right: 85px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" onclick="location.href='PHPScript/back.php'">Back</button>
<body>
<!-- Total transaction in this month
Total sales this month
total item sold

best selling by quantity
best selling by type -->

<h1>Detailed Sales Report for <?php echo $monthName; ?> </h1>
<hr>


<h2>Total Successful Transaction this Month: <?php echo $count;?></h2>
<table id="transaction-table">
	<thead>
		<tr>
			<th>Transaction ID</th><th>Item Name</th><th>Item Quantity</th><th>Customer Username</th><th>Timestamp</th><th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php salesThisMonth(); ?>
	</tbody>
	<tfoot>
		<tr class="summary">
			<td></td><td></td><td></td><td></td><td class="right" style="font-weight: bold;">TOTAL</td><td class="right"></td>
		</tr>
	</tfoot>
</table>

<h2>Total Item Sold this Month: <?php echo $itemsold;?></h2>
<table id="itemsold">
	<thead>
		<tr>
			<th>Item ID</th><th>Item Name</th><th>Item Price</th><th>Item Quantity</th><th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php totalItemSold(); ?>
	</tbody>
	<tfoot>
		<tr class='summary'>
			<td></td><td></td><td></td><td class="right" style="font-weight: bold;">TOTAL</td><td class="right"></td>
		</tr>
	</tfoot>
</table>

<h2>Total Cancelled Transaction this Month: <?php echo $cancelled;?></h2>
<table id="cancelled-table">
	<thead>
		<tr>
			<th>Transaction ID</th><th>Item Name</th><th>Item Quantity</th><th>Customer Username</th><th>Total</th><th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<?php cancelledThisMonth(); ?>
	</tbody>
</table>

<h2>Best Item Sold</h2>
<table>
	<thead>
		<tr>
			<th>Item ID</th><th>Item Name</th><th>Quantity Sold</th>
		</tr>
	</thead>
	<tbody>
		<?php bestSell();?>
	</tbody>
</table><br>

<h2>Best Type Sold</h2>
<table>
	<thead>
		<tr>
			<th>Item Type</th><th>Quantity Sold</th>
		</tr>
	</thead>
	<tbody>
		<?php bestType();?>
	</tbody>
</table><br>

</body>
</html>