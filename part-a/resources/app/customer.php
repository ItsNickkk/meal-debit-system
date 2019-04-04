<!DOCTYPE html>
<html>
<head>
	<title>Customer Management</title>
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

    		$('#delete').click(function() {
                if($("#custBalTxt").val()=='0.00'){
    				if (confirm('Are you sure you want to delete this customer from database?')) {
    					var id = $("#custIDTxt").val();
    					$.post("PHPScript/deleteCustomer.php",
    					{id : id}, function(data){
    						alert(data);
    						location.reload(true);
    					});
        			}
                }
                else{
                    alert('Balance must be 0.00 MYR to carry out this operation!')
                }
 			});

			$( '#search' ).keyup( function() {
        		var matches = $( 'ul#emc-list' ).find( 'li:contains('+ $( this ).val() +') ' );
        		$( 'li', 'ul#emc-list' ).not( matches ).slideUp();
       		 matches.slideDown();    
    		});

    		$('.emc-selection').click(function(){
    			var id = $(this).attr('emcid');
    			$.post("PHPScript/fetchCustomerDetails.php",
					{id : id}, function(data){
						$('#ajax-table').html(data);
						$('#save').css("display","block");
    					$('#delete').css("display","block");
					});
    		});


    		$('#save').click(function(){
                var id = $('#custIDTxt').val();
                var bal = $('#custBalTxt').val();
                if(id == "" || bal == "" ){
                    alert("Please fill in every required field!");
                }
                else{
                    $.post("phpscript/updateCustomerBal.php",
                    {id: id,
                    bal: bal
                    },
                    function(resultt){
                        alert(resultt);
                        location.reload(true);
                    });
            }});

		});
	</script>
</head>
<body id="body" class="bg-col" style="overflow-y: hidden;overflow-x: hidden;">

<div style=" width: 100%;">
	<h1 style="display: inline;color: white; margin-left: 20px;"class="animated slideInUp">Customer Management</h1>

	<button style="float:right;display: inline;margin-top: 15px;margin-bottom: 20px; margin-right: 85px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" onclick="location.href='PHPScript/back.php'">Back</button>
</div>
<div style="width: 100vw; clear: both;" class="animated slideInUp">
<div id="emc-container-1" class="scroll animated slideInLeft">
	<div class="emc-search-container"><input class="emc-search-txt" id="search" placeholder="Search by ID" type="text" name=""></div>
	<div class="emc-result-container">
		<ul style="list-style-type: none; padding-left: 0" id="emc-list">
			<?php
			include ('phpscript/conn.php');
			$sql="SELECT * from customer";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result) <= 0){
				echo "<script>alert('An Internal Error Occured!');</script>";
			}
			else{
				while($rows = mysqli_fetch_array($result)){
					echo '<li><a class="emc-selection" emcid="'.$rows['customerID'].'">
							'.$rows['customerID'].'<br>'.$rows['customerUsername'].'
							</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>
<!-- id ic name phone email bal username -->
<div id="emc-container-2" class="animated slideInUp">
	<div id="ajax-table">
	   <table style="width: 100%; margin-left: auto;margin-right: auto;" id="emc-table">
        <tr>
            <td>
                ID:<br>
                <input type="text" class="emc-txtfield readonly"  readonly="readonly" value="" id="custIDTxt">
            </td>
            <td>
                IC Number:<br>
                <input id="custICTxt" type="text" class="emc-txtfield readonly" readonly="readonly" onkeypress="return isNumberKey(event); limit(this)">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Name: <br>
                <input id="custNameTxt" type="text" class="emc-txtfield readonly" readonly="readonly" style="width: 84%">
            </td>
        </tr>
        <tr>
            <td>
                Balance:<br>
                <input id="custBalTxt" type="text" class="emc-txtfield" onkeypress="return isNumberKey(event); limit(this)" maxlength="10">
            </td>
            <td>
                Username:<br>
                <input id="custUserTxt" type="text" class="emc-txtfield readonly" readonly="readonly" >
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:<br>
                <input id="custHPTxt" type="text" class="emc-txtfield readonly" readonly="readonly" onkeypress="return isNumberKey(event); limit(this)">
            </td>
            <td>
                Email:<br>
                <input id="custEmailTxt" type="email" class="emc-txtfield readonly" readonly="readonly" >
            </td>
        </tr>
    </table>
</div>
<div>
    <button id="save" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: none;">Save Changes</button>
    <button id="delete" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: none;">Delete Customer</button>
</div>
</div>
</div>
</body>
</html>