<!DOCTYPE html>
<html>
<head>
	<title>Reports</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/animation.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
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
		#month-selector{
			background-color: #464646;
			border: 2px solid #82B590;
			padding: 5px;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			float: right;
			margin-top: 30px;
			height: 40px;
			width: 100px;
			margin-right: 30px;
		}
		#month-selector:hover{
			background-color: #2c2f33;
		}

	</style>
</head>
<script>
	resize(1000, 700);       
</script>
	<body id="body" class="bg-col" style="overflow: hidden; padding-bottom: 5px;">
	<div style="display: block;">
		<h1 style="color: white; margin-left: 20px; float: left;"class="animated slideInUp">Reports</h1>
		<button style="float: right;margin-top: 30px; margin-right: 85px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" onclick="location.href='PHPScript/back.php'">Back</button>
		<form action="detailedReport.php" method="post">
		<input type='submit' style="float: right;margin-top: 30px; margin-right: 50px; height: 40px; width: 200px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" value="Generate Detailed Report">
		<select name="month" id="month-selector" class="animated slideInUp">
			<option value='1'>Janaury</option>
		    <option value='2'>February</option>
		    <option value='3'>March</option>
		    <option value='4'>April</option>
		    <option value='5'>May</option>
		    <option value='6'>June</option>
		    <option value='7'>July</option>
		    <option value='8'>August</option>
		    <option value='9'>September</option>
		    <option value='10'>October</option>
		    <option value='11'>November</option>
		    <option value='12'>December</option>
		</select>
		
		</form>
	</div>


<script>
	$(document).ready(function(){
		$("#month-selector").on("change", function(){
			var month = $(this).children("option:selected").val();
			$.post("phpscript/generatereport.php", {month : month}, );
		});
	});

</script>

<?php

$month = date('n');

include ('phpscript/conn.php');

$sqlsales = "SELECT total from `order` where month(datetime) = ".$month." and status='1' group by transactionID";
$resultsales = mysqli_query($con, $sqlsales);
$sum = 0;
$count = 0;
while($rowssales = mysqli_fetch_array($resultsales)){
$count = $count+1;				//Total Transaction this month
$sum = $sum+$rowssales['total'];//Total Item Sold
}

$sqlcount = "SELECT itemQuantity from `order` where status = '1' and month(datetime) =".$month;
$resultcount = mysqli_query($con,$sqlcount);
$itemsold = 0;
while($rowscount = mysqli_fetch_array($resultcount)){
	$itemsold = $itemsold+$rowscount['itemQuantity'];



	$sqlbestsell="select itemID, sum(itemQuantity) from `order` where status='1' group by itemID limit 5";
	$resultbestsell=mysqli_query($con, $sqlbestsell);
$mostItemChart="";
while($rowsbestsell = mysqli_fetch_array($resultbestsell)){
	$sqlitem="Select * from item where itemID =".$rowsbestsell['itemID'];
	$resultitem = mysqli_query($con, $sqlitem);
	$rowsitem = mysqli_fetch_array($resultitem);
	$itemname = $rowsitem['itemName'];
	$mostItemChart = $mostItemChart."['".$itemname."',".$rowsbestsell['sum(itemQuantity)']."],";
}
$sqlbesttype = "SELECT item.itemType, sum(`order`.itemQuantity) as total FROM `order` RIGHT JOIN item on `order`.itemID = item.itemID where `order`.status = '1' and month(datetime) = ".$month." group by item.itemType limit 5";
$resultbesttype=mysqli_query($con, $sqlbesttype);
$besttype="";
while($rowsbesttype=mysqli_fetch_array($resultbesttype)){
	$besttype = $besttype."['".$rowsbesttype['itemType']."',".$rowsbesttype['total']."],";
}

}

?>

<div id="chart-area" style="overflow-y: scroll;" class="animated slideInUp scroll">
	<div style="width: 100%"> 
			<h2 style="margin-top: 0px; display: inline-block;">Summary for the month <?php echo date('F');?></h2> 
		<table class="monthly-summary">
			<tr>
				<td>Total Successful Transaction<br><?php echo $count;?></td>
				<td>Total Sales This Month<br><?php echo $sum;?> MYR</td>
				<td>Total Item Sold<br><?php echo $itemsold;?> Items</td>
			</tr>
			</tr>
		</table>
	</div> 

	<h3>Best Selling Item by Quantity</h3>
	<div id="mostItemChart" style="width: 800px; height: 350px; margin:auto"></div><br>
	<h3>Best Selling Item by Type</h3>
	<div id="mostType" style="width: 800px; height: 350px; margin:auto"></div><br>
</div>



<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(mostItemChart);
	google.charts.setOnLoadCallback(mostType);
	google.charts.setOnLoadCallback(salesComparedtoLastMonth);

	function mostItemChart() {
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			<?php echo rtrim($mostItemChart,",");?>
		]);

		var options = {
		  backgroundColor: '#464655',
		  color: '#FFFFFF',
		  legend: {
			alignment:'end',
			textStyle:{
				color:'white'
			}
		  },
		  titleTextStyle:{
			color:'#FFFFFF'
		  }
		};

		var chart = new google.visualization.PieChart(document.getElementById('mostItemChart'));

		chart.draw(data, options);
	  }

	function mostType() {
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			<?php echo rtrim($besttype,",");?>
		]);

		var options = {
		  backgroundColor: '#464655',
		  color: '#FFFFFF',
		  legend: {
			alignment:'end',
			textStyle:{
				color:'white'
			}
		  },
		  titleTextStyle:{
			color:'#FFFFFF'
		  }
		};



		var chart = new google.visualization.PieChart(document.getElementById('mostType'));

		chart.draw(data, options);
	  }



</script>
</body>
</html>
<!-- select itemID, sum(itemQuantity) from `order` group by itemID -->