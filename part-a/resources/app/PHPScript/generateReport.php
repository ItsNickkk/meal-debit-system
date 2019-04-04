<?php
if(isset($_POST['month'])){
	$month = $_POST['month'];
}
else{
	$month = date('n');
}

include ('conn.php');


$sqlsales = "SELECT total from `order` where month(datetime) = '".$month."' group by transactionID";

$resultsales = mysqli_query($con, $sqlsales);
$sum = 0;
$count = 0;
while($rowssales = mysqli_fetch_array($resultsales)){
$count = $count+1;
$sum = $sum+$rowssales['total'];
}

$sqlcount = "SELECT itemQuantity from `order` where month(datetime) ='".$month."'";
$resultcount = mysqli_query($con,$sqlcount);
$itemsold = 0;
echo $sqlcount;
while($rowscount = mysqli_fetch_array($resultcount)){
	$itemsold = $itemsold+$rowscount['itemQuantity'];



$sqlbestsell="select itemID, sum(itemQuantity) from `order` group by itemID limit 5";
$resultbestsell=mysqli_query($con, $sqlbestsell);
$mostItemChart="";
while($rowsbestsell = mysqli_fetch_array($resultbestsell)){
	$sqlitem="Select * from item where itemID =".$rowsbestsell['itemID'];
	$resultitem = mysqli_query($con, $sqlitem);
	$rowsitem = mysqli_fetch_array($resultitem);
	$itemname = $rowsitem['itemName'];
	$mostItemChart = $mostItemChart."['".$itemname."',".$rowsbestsell['sum(itemQuantity)']."],";
}
echo $mostItemChart;
$sqlbesttype = "SELECT item.itemType, sum(`order`.itemQuantity) as total FROM `order` RIGHT JOIN item on `order`.itemID = item.itemID group by item.itemType limit 5";
$resultbesttype=mysqli_query($con, $sqlbesttype);
$besttype="";
while($rowsbesttype=mysqli_fetch_array($resultbesttype)){
	$besttype = $besttype."['".$rowsbesttype['itemType']."',".$rowsbesttype['total']."],";
}

}


echo'
	<div style="width: 100%"> 
		<div style="display: inline">
			<h2 style="margin-top: 0px; display: inline-block;">Summary for the month '.date('F').'</h2> 
			<select id="month-selector" style="display: inline-block; margin-left: 30vw;">
				<option>January</option>
				<option>February</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
			</select>
		</div>
		<table class="monthly-summary">
			<tr>
				<td>Total Transaction<br>'.$count.'</td>
				<td>Total Sales This Month<br>'.$sum.'MYR</td>
				<td>Total Item Sold<br>'.$itemsold.'Items</td>
			</tr>
			</tr>
		</table>
	</div> 

	<h2>Best Selling Item by Quantity</h2>
	<div id="mostItemChart" style="width: 800px; height: 350px; margin:auto"></div><br>
	<h2>Best Selling Item by Type</h2>
	<div id="mostType" style="width: 800px; height: 350px; margin:auto"></div><br>

	';
echo"
<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(mostItemChart);
	google.charts.setOnLoadCallback(mostType);
	google.charts.setOnLoadCallback(salesComparedtoLastMonth);

	function mostItemChart() {
		var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			".rtrim($mostItemChart,',')."
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
			".rtrim($besttype,',')."
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

	function salesComparedtoLastMonth() {
		var data = google.visualization.arrayToDataTable([
		  ['Month', 'Last Month', 'This Month'],
		  ['',  1000,      400],
		  ['',  1170,      460],
		  ['',  660,       1120],
		  ['',  1030,      540]
		]);

		var options = {
		  title: 'Sales compared to last month',
		  titleTextStyle:{color:'#FFFFFF'},
		  hAxis: {title: 'Month',  
				  titleTextStyle: {color: '#FFFFFF'},
				  textStyle: {color: '#FFFFFF'}
				},
		  vAxis: {minValue: 0,
				  textStyle: {color: '#FFFFFF'},
				 },
		  backgroundColor: '#464655',
		  chartArea : {
			backgroundColor:'#464655'
		  },
		  legend:{ textStyle:{color:'#FFFFFF'}},
		};

		var chart = new google.visualization.AreaChart(document.getElementById('salesComparedtoLastMonth'));
		chart.draw(data, options);
	  }



</script>
";
?>





?>