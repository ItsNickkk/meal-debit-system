<!DOCTYPE html>
<html>
<head>
	<title>Transaction History</title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
	<script>if (window.module) module = window.module;</script>
	<script>
		resize(1000,700);

		$(document).ready(function () {


    		$('.transaction-listing').click(function () {
        		$(this).next('div').slideToggle();
        
        		$(this).parent().siblings().children().next().slideUp();
        	return false;
    		});

    		$('a.open-modal').click(function(event) {
				$(this).modal({
			    	fadeDuration: 250,
					fadeDelay: 1.5
				});
				return false;	
			});

			$("#search").on("keyup", function() {
   				var value = $(this).val().toLowerCase();
    			$("#details tr").filter(function() {
      				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    			});
  			});

  			

		});
	</script>
</head>
<body id="body" class="bg-col" style="overflow-y: hidden;overflow-x: hidden;">
<div style="display: block;">
	<h1 style="color: white; margin-left: 20px; float: left;"class="animated slideInUp">Transaction History</h1>
	<input type="text" id="search" placeholder="Search here..." class="txsearch animated slideInUp" onkeypress="return isNumberKey(event); limit(this)">
	<button style="float: right;margin-top: 30px; margin-right: 85px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" onclick="location.href='PHPScript/back.php'">Back</button>
</div>
<div id="listings" class=" animated slideInUp scroll">
	<?php 
	include('phpscript/conn.php');
	$sqlorder = "SELECT * FROM `order` GROUP BY transactionID ORDER BY transactionID desc ";
	$resultorder = mysqli_query($con, $sqlorder);
	if(mysqli_num_rows($resultorder) <= 0){
		echo "<script>alert('An Internal Error Occured!');</script>";
	}
	else{
		while($rowsorder = mysqli_fetch_array($resultorder)){
			$txid = $rowsorder['transactionID'];
			$itemqty = $rowsorder['itemQuantity'];
			$total = $rowsorder['total'];
			$date = $rowsorder['datetime'];
			$status = $rowsorder['status'];
			$remark = $rowsorder['remark'];
			$custid = $rowsorder['customerID'];
			//Find Employee table
			$sqlemployee = "SELECT * FROM employee where employeeID='".$rowsorder['employeeID']."'";
			$resultemployee = mysqli_query($con, $sqlemployee);
			$rowsemployee=mysqli_fetch_array($resultemployee);
			$employeeName = $rowsemployee['employeeName'];

			//Find Item table
			$sqlitem = "SELECT * FROM item where itemID=".$rowsorder['itemID'];
			$resultitem = mysqli_query($con, $sqlitem);
			$resultitem=mysqli_fetch_array($resultitem);
			$itemname = $resultitem['itemName'];
			$price = $resultitem['itemPrice'];

			//Find Customer Table
			$sqlcustomer = "SELECT * FROM customer where customerID='".$rowsorder['customerID']."'";
			$resultcustomer = mysqli_query($con, $sqlcustomer);
			$rowscustomer=mysqli_fetch_array($resultcustomer);
			$customerName = $rowscustomer['customerUsername'];





			echo'	
	<div class="transaction-wrapper">
  		<a href="#0" class="transaction-listing" style="text-decoration: none;">
  			<table style="width: 100%" id="details">
  				<tr>
  					<td style="text-align: left;padding-left: 10px;" id="txid">'.$txid.'</td><td style="text-align: right; padding-right: 10px">'.$total.'MYR</td>
  				</tr>	
  				<tr>
  					<td style="text-align: left;padding-left: 10px;;">'.$date.'</td><td style="text-align: right; padding-right: 10px">
  					';
  					if($status == '1'){
  						echo '<span style="border: 1px solid #82B590; border-radius: 5px; color: #82B590; padding:0px 5px 0px 5px;">Completed</span>';
  					}
  					else{
  						echo '<span style="border: 1px solid #B20003; border-radius: 2px; color: #B20003; padding:0px 5px 0px 5px;">Cancelled</span>';
  					}
  					echo'</td>
  				</tr>
  			</table>
  		</a>
		<div class="transaction-details" style="display: none;">
			<div style="background-color: #2c2f33; border-radius: 10px;">
				<hr>
				<h1 style="text-decoration: underline; margin-bottom: 5px;">Amount</h1>
				<span>'.$date.' ■ Processed by: '.$employeeName.'</span>
				<hr>'.$customerName.'<hr>
				<div style="width: 90%; margin-left: auto;margin-right: auto;">
					<table class="listing-table" style="border-collapse: collapse;">
						<thead>
							<tr>
								<th class="listing-body-tc1" style="border-bottom: 1px solid grey">Item Name</th>
								<th class="listing-body-tc2" style="border-bottom: 1px solid grey">Price Each</th>
								<th class="listing-body-tc3" style="border-bottom: 1px solid grey">Quantity</th>
							</tr>
						</thead>
						<tbody>
						';
						$sqlorder2 = "SELECT * FROM `order`where transactionID=".$txid;
						$resultorder2 = mysqli_query($con, $sqlorder2);
						while($rowsorder2 = mysqli_fetch_array($resultorder2)){
							$itemqty2 = $rowsorder2['itemQuantity'];
							$itemid2 = $rowsorder2['itemID'];


							//Find Item table
							$sqlitem2 = "SELECT * FROM item where itemID=".$itemid2;
							$resultitem2 = mysqli_query($con, $sqlitem2);
							$resultitem2=mysqli_fetch_array($resultitem2);
							$itemname2 = $resultitem2['itemName'];
							$price2 = $resultitem2['itemPrice'];
						echo'
							<tr>
								<td class="listing-body-tc1">'.$itemname2.'</td>
								<td class="listing-body-tc2">'.$price2.'MYR</td>
								<td class="listing-body-tc3">'.$itemqty2.'</td>
							</tr>
						';
						}
						echo'
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" style="text-align: right; border-top: 1px solid grey"><b>TOTAL</b></td>
								<td style="; border-top: 1px solid grey">'.$total.'MYR</td>
							<tr>
							<tr>
								<td colspan="3">
									';
									if($status == 1){
										echo '<a class="a-loginBtn cancelBtn open-modal" href="PHPScript/canceltx.php?txid='.$txid.'&custid='.$custid.'" rel="modal:open">Cancel Transaction</a>';
									}
									else if($status == 0){
										echo '<a class="cancelledBtn open-modal" href="#">Transaction Cancelled </a><br><br><span style="font-size:15px">'.$remark.'</span>';
									}
									

									echo'
								</td>
							</tr>
							<tr><td colspan="3" style="height: 30px"></td></tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>';
		}
	}
?>

</div>
</body>
</html>