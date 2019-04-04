<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>POS Interface</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/animation.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
	<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
	<script type="text/javascript" src="JS/Validation.js"></script>
	<script type="text/javascript" src="JS/closemaxmin.js"></script>
	<script type="text/javascript" src="JS/someFunction.js"></script>
	<script src="JS/jquery-3.3.1.min.js"></script>
	<script src="JS/jquery.sumtr.js"></script>
	<script>if (window.module) module = window.module;</script>
	<script>
		resize(1000,700);

		$(document).ready(function(){
			//Select barcode textbox onload
			$('#barcode').focus()
			//AJAX Add entries to table
			$("#search").click(function(){
				var barcode = $('#barcode').val();
				var verify = barcode.indexOf("myr");
				if(verify < 0){
				$.post("PHPScript/addItemToTable.php",
					{barcode: $("#barcode").val()}, 
					function(data){
						if(data == "failed"){
							alert('Item not found!');
						}
						else{
							$("#itemPOS tbody").append(data);
							$('#itemPOS').sumtr({
								readValue : function(e) { return parseFloat(e.html().replace(/[^0-9\.]+/g, "")); },
	    						formatValue : function(val) { return  val + 'MYR'; },
	    					});
	    					$("#total-sum").text($(".summary-total").text());
	    					$("payBarcode").click();
    					}
					});
				}
				else{
					$("#paymentBarcode").val($('#barcode').val());
					$("#payBarcode").click();
				}
			});

			// Clear rows
			$(".delete-row").click(function(){
            $("#itemPOS tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                    $('#itemPOS').sumtr({
								readValue : function(e) { return parseFloat(e.html().replace(/[^0-9\.]+/g, "")); },
	    						formatValue : function(val) { return  val + 'MYR'; },
	    					});
                }
            });
            $("#total-sum").text($(".summary-total").text());
			});
            //Select all checkboxes
            $("#select_all").change(function(){  //"select all" change 
				var status = this.checked; // "select all" checked status
				$('.del-entry').each(function(){ //iterate all listed checkbox items
					this.checked = status; //change ".checkbox" checked status
				});
			

			$('.del-entry').change(function(){ //".checkbox" change 
			//uncheck "select all", if one of the listed checkbox item is unchecked
			if(this.checked == false){ //if this item is unchecked
				$("#select_all")[0].checked = false; //change "select all" checked status to false
				}
	
			//check "select all" if all checkbox items are checked
			if ($('.del-entry:checked').length == $('.del-entry').length ){ 
				$("#select_all")[0].checked = true; //change "select all" checked status to true
				}
			});

        });


		//Payment
		$("#payBarcode").click(function(){
			temp = $("#total-sum").html();
			totalamt = temp.substring(0, temp.length - 3);

			if($("#paymentBarcode").val() !== null && $("#paymentBarcode").val() !== ''){
			$.post("PHPScript/makePayment.php", 
				{paymentqr : $("#paymentBarcode").val(),
				 total : totalamt},
				function(result){
					if(result=="success"){
						// alert("Payment Verified!");
						var rows = [];
						$('.itemID').each(function(index, element){
							rows.push($(element).text());
						});
						
						$.post("PHPScript/addTransaction.php",
							{paymentqr : $("#paymentBarcode").val(),
							 itemID : rows,
							 total : totalamt},
							 function(resultt){
							 	if(resultt.indexOf("success") >= 0){;
							 		// alert("Transaction Completed!");
							 		$('#paymentBarcode').val('');
							 		location.reload(true);
							 	}
							 	else{	
							 		alert("An error occured!");
							 		$('#paymentBarcode').val('');
							 	}
							 });
					}
					else{
						alert("An error occured! Error: "+result);
					}
				}
				);
			}
			else{
				alert("No payment barcode is entered!")
			}
		});




		});
	</script>

</head>

<body id="body" class="bg-col" style="overflow-y: hidden;overflow-x: hidden;">

<input type="text" name="barcode" id="barcode" class="barcode-input" placeholder="Search by 2D Barcode...">

<button id="search" class="search-btn-pos a-loginBtn"><img src="ImagesRepo/icons/Search.png" style="height: 30px; width: 30px;vertical-align: middle; padding-right: 10px;">Search</button>


<span style="float: right; margin-top: 10px; color: white;">Logged in as <?php echo $_SESSION['name']?> <br><span style=" font-size: 10px; text-align: right;"> Not you? <a style="color: #82B590;" href="PHPScript/logout-action.php"> Log Out</a></span></span>
<button style="float: right; margin: 10px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn" onclick="location.href='PHPScript/back.php'">Back</button>
<hr style="margin-top: 15px; margin-bottom: 15px;">

<div id="itemposdiv" class="scroll">
	<table id=itemPOS style="border-collapse: collapse;">
		<thead>
			<tr>
				<th style="text-align: center;"><input type="checkbox" id="select_all"/></th>
				<th class="hidden">ID</th>
				<th style="width: 35vw; text-align: left;">Item Name</th>
				<th style="width: 10vw">Price</th>
			</tr>
		</thead>
		<tbody>
			<tr class="hidden">
				<td></td><td></td><td></td><td class="sum">0</td>
			</tr>	
		</tbody>
		<tfoot>
			<tr class="summary">
				<td></td>
				<td class="hidden"></td>
				<td>Total</td>
				<td class="summary-total">0MYR</td>
			</tr>
		</tfoot>
	</table>

</div>
<div id="pos-payment">
	<div id="total-container">
		Total:<br>
		<span id="total-sum">0MYR</span><br>
		<span><input type="text" id="paymentBarcode" placeholder="Enter payment barcode"></span><br>
		<button id="payBarcode" class="a-loginBtn">Confirm</button>
	</div>
</div>
<button type="button" class="delete-row a-loginBtn">Delete Entries</button>


<script type="text/javascript">
//Enter button fires Search
var input = document.getElementById("barcode");
input.addEventListener("keyup", function(event) {
	if (event.keyCode === 13) {
	event.preventDefault();
	 document.getElementById("search").click();
	 input.value="";
}
});

//Enter button fires Pay
var pymnt = document.getElementById("paymentBarcode");
pymnt.addEventListener("keyup", function(event) {
	if (event.keyCode === 13) {
	event.preventDefault();
	 document.getElementById("payBarcode").click();
}
});

</script>
</body>
</html>