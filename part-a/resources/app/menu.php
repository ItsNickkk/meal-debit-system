<!DOCTYPE html>
<html>
<head>
	<title>Menu Management</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/animation.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
	<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
	<script type="text/javascript" src="JS/Validation.js"></script>
	<script type="text/javascript" src="JS/closemaxmin.js"></script>
	<script type="text/javascript" src="JS/someFunction.js"></script>
	<script src="JS/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
	<script>
		if (window.module) module = window.module;
		resize(1000,700);	

		$(document).ready(function(){
			$.post("PHPScript/selectMax.php", {req: "menu"} ,function(data){
						$('#itemIDTxt').val(data)});

    		$('#delete').click(function() {
				if (confirm('Are you sure you want to delete this item from menu?')) {
					var id = $("#itemIDTxt").val();
					$.post("PHPScript/deleteItem.php",
					{id : id}, function(data){
						alert(data);
						location.reload(true);
					});
    			}
 			});

			$( '#search' ).keyup( function() {
        		var matches = $( 'ul#emc-list' ).find( 'li:contains('+ $( this ).val() +') ' );
        		$( 'li', 'ul#emc-list' ).not( matches ).slideUp();
       		 matches.slideDown();    
    		});

    		$('.emc-selection').click(function(){
    			var id = $(this).attr('emcid');
    			$.post("PHPScript/fetchItemDetails.php",
					{id : id}, function(data){
						$('#ajax-table').html(data);
						$('#save').css("display","block");
    					$('#delete').css("display","block");
    					$('#add').css("display","none");
    					$('#makeAdmin').css("display","block");
					});
    		});

    		$('#addItem').click(function(){
    			$('#save').css("display","none");
    			$('#delete').css("display","none");
    			$('#add').css("display","block");
    			$("input[type=text],input[type=password],input[type=email]").val("");
    			$("#address").val(null);
    			$("#role").val("null");
    			$.post("PHPScript/selectMax.php", {req: "menu"} ,function(data){
						$('#itemIDTxt').val(data)});
    		});

    		$('#add').click(function(){
    			var id = $('#itemIDTxt').val();
                var name = $('#itemNameTxt').val();
                var type = $('#itemTypeTxt').val();
                var price = $('#itemPriceTxt').val();
                if(id == "" || name == "" || type == "" || price == ""){
                    alert("Please fill in every field!");
                }
    			else{
    				$.post("phpscript/addMenu.php",
    				{id: id,
                    name: name,
                    type: type,
                    price: price,
      				},
      				function(resultt){
      					alert(resultt);
      					$("input[type=text],input[type=password],input[type=email]").val("");
		    			$("#address").val(null);
		    			$("#role").val("null");
		    			$.post("PHPScript/selectMax.php", {req: "emp"} ,function(data){
						$('#itemIDTxt').val(data)});
						location.reload(true);
      				});
    			}
    		});


    		$('#save').click(function(){
    			var id = $('#itemIDTxt').val();
    			var name = $('#itemNameTxt').val();
    			var type = $('#itemTypeTxt').val();
    			var price = $('#itemPriceTxt').val();
    			if(id == "" || name == "" || type == "" || price == ""){
    				alert("Please fill in every field!");
    			}
    			else{
    				$.post("phpscript/editMenu.php",
    				{id: id,
    				name: name,
    				type: type,
    				price: price,
      				},
      				function(resultt){
      					alert(resultt);
		    			location.reload(true)
      				});
    		}});

		});
	</script>
</head>
<body id="body" class="bg-col" style="overflow-y: hidden;overflow-x: hidden;">

<div style=" width: 100%;">
	<h1 style="display: inline;color: white; margin-left: 20px;"class="animated slideInUp">Menu Management</h1>

	<button style="float:right;display: inline;margin-top: 15px;margin-bottom: 20px; margin-right: 85px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" onclick="location.href='PHPScript/back.php'">Back</button>
    <button style="float: right; display: inline;margin-top: 15px;margin-bottom: 20px; margin-right: 20px; height: 40px; width: 150px;border: 1px solid #82B590;color:white"" class="a-loginBtn animated slideInUp" id="addItem">Add Menu Item</button>
</div>
<div style="width: 100vw; clear: both;" class="animated slideInUp">
<div id="emc-container-1" class="scroll animated slideInLeft">
	<div class="emc-search-container"><input class="emc-search-txt" id="search" placeholder="Search by ID" type="text" name=""  onkeypress="return isNumberKey(event); limit(this)"></div>
	<div class="emc-result-container">
		<ul style="list-style-type: none; padding-left: 0" id="emc-list">
			<?php
			include ('phpscript/conn.php');
			$sql="SELECT * from item where status =1";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result) <= 0){
				echo "<script>alert('An Internal Error Occured!');</script>";
			}
			else{
				while($rows = mysqli_fetch_array($result)){
					echo '<li><a class="emc-selection" emcid="'.$rows['itemID'].'">
							'.$rows['itemID'].'<br>'.$rows['itemName'].'
							</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>

<div id="emc-container-2" class="animated slideInUp">
	<div id="ajax-table">
	<table style="width: 100%; margin-left: auto;margin-right: auto;" id="emc-table">
        <tr>
            <td colspan="2" style="padding-bottom: 50px;">
                ID:<br>
                <input type="text" class="emc-txtfield readonly" name="EmployeeID" readonly="readonly" value="" id="itemIDTxt">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom: 50px;">
                Menu Item Name: <br>
                <input id="itemNameTxt" type="text" class="emc-txtfield" name="EmployeeName" style="width: 84%">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 50px;">
                Menu Item Type:<br>
                <input type="text" id="itemTypeTxt" class="emc-txtfield">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px;">
                Price:<br>
                <input id="itemPriceTxt" type="text" class="emc-txtfield" name="EmployeePhone" onkeypress="return isNumberKey(event); limit(this)">
            </td>
        </tr>
		
	</table>
</div>
<div>
    <button id="save" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: none;">Save Changes</button>
    <button id="delete" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: none;">Delete Item</button>
    <button id="add" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: block;">Add Item</button>
</div>
</div>
</div>
</body>
</html>