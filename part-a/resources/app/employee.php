<!DOCTYPE html>
<html>
<head>
	<title>Employee Management</title>
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
			$.post("PHPScript/selectMax.php", {req: "emp"} ,function(data){
						$('#empIDTxt').val(data)});

    		$('#delete').click(function() {
				if (confirm('Are you sure you want to delete this employee?')) {
					var id = $("#empIDTxt").val();
					$.post("PHPScript/deleteEmployee.php",
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
    			$.post("PHPScript/fetchEmployeeDetails.php",
					{id : id}, function(data){
						$('#ajax-table').html(data);
						$('#save').css("display","block");
    					$('#delete').css("display","block");
    					$('#add').css("display","none");
    					$('#makeAdmin').css("display","block");
					});
    		});

    		$('#makeAdmin').click(function(){
    			var id = $('#empIDTxt').val();
    			$.post("PHPScript/makeAdmin.php",
					{id : id}, function(data){
						alert(data);
						location.reload(true);
					});
    		});

    		$('#addEmp').click(function(){
    			$('#save').css("display","none");
    			$('#delete').css("display","none");
    			$('#add').css("display","block");
    			$('#makeAdmin').css("display","none");
    			$("input[type=text],input[type=password],input[type=email]").val("");
    			$("#address").val(null);
    			$("#role").val("null");
    			$.post("PHPScript/selectMax.php", {req: "emp"} ,function(data){
						$('#empIDTxt').val(data)});
    		});

    		$('#add').click(function(){
    			var id = $('#empIDTxt').val();
    			var ic = $('#empICTxt').val();
    			var name = $('#empNameTxt').val();
    			var role = $("#empRoleTxt option:selected").text();
    			if(role == "Non-managerial Level"){
    				var role2 = '1';
    			}
    			else if(role == "Managerial Level"){
    				var role2 = '0';
    			}
    			var pass = $('#empPWTxt').val();
    			var hp = $('#empHPTxt').val();
    			var email = $('#empEmailTxt').val();
    			var add = $("#address").val();
    			if(id == "" || ic == "" || name == "" || role == null || pass == "" || hp == "" | email == "" || add == ""){
    				alert("Please fill in every field!");
    			}
    			else{
    				$.post("phpscript/addEmployee.php",
    				{id: id,
    				ic: ic,
    				name: name,
    				role: role2,
    				pass: pass,
    				hp: hp,
    				email: email,
    				add: add,
      				},
      				function(resultt){
      					alert(resultt);
      					$("input[type=text],input[type=password],input[type=email]").val("");
		    			$("#address").val(null);
		    			$("#role").val("null");
		    			$.post("PHPScript/selectMax.php", {req: "emp"} ,function(data){
						$('#empIDTxt').val(data)});
						location.reload(true);
      				});
    			}
    		});


    		$('#save').click(function(){
    			var id = $('#empIDTxt').val();
    			var ic = $('#empICTxt').val();
    			var name = $('#empNameTxt').val();
    			var role = $("#empRoleTxt option:selected").text();
    			if(role == "Non-managerial Level"){
    				var role2 = '1';
    			}
    			else if(role == "Managerial Level"){
    				var role2 = '0';
    			}
    			var pass = $('#empPWTxt').val();
    			var hp = $('#empHPTxt').val();
    			var email = $('#empEmailTxt').val();
    			var add = $("#address").val();
    			if(id == "" || ic == "" || name == "" || pass == "" || hp == "" | email == "" || add == ""){
    				alert("Please fill in every field!");
    			}
    			else{
    				$.post("phpscript/editEmployee.php",
    				{id: id,
    				ic: ic,
    				name: name,
    				role: role,
    				pass: pass,
    				hp: hp,
    				email: email,
    				add: add,
    				role: role2,
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
	<h1 style="display: inline;color: white; margin-left: 20px;"class="animated slideInUp">Employee Management</h1>
	
	<button style="float:right;display: inline;margin-top: 15px;margin-bottom: 20px; margin-right: 85px; height: 40px; width: 50px;border: 1px solid #82B590;color:white" class="a-loginBtn animated slideInUp" onclick="location.href='PHPScript/back.php'">Back</button>
	<button style="float: right; display: inline;margin-top: 15px;margin-bottom: 20px; margin-right: 20px; height: 40px; width: 150px;border: 1px solid #82B590;color:white"" class="a-loginBtn animated slideInUp" id="addEmp">Add Employee</button>
</div>
<div style="width: 100vw; clear: both;" class="animated slideInUp">
<div id="emc-container-1" class="scroll animated slideInLeft">
	<div class="emc-search-container"><input class="emc-search-txt" id="search" placeholder="Search by ID" type="text" name=""  onkeypress="return isNumberKey(event); limit(this)"></div>
	<div class="emc-result-container">
		<ul style="list-style-type: none; padding-left: 0" id="emc-list">
			<?php
			include ('phpscript/conn.php');
			$sql="SELECT * from employee where status='1'";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result) <= 0){
				echo "<script>alert('An Internal Error Occured!');</script>";
			}
			else{
				while($rows = mysqli_fetch_array($result)){
					echo '<li><a class="emc-selection" emcid="'.$rows['employeeID'].'">
							'.$rows['employeeID'].'<br>'.$rows['employeeName'].'
							</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>

<div id="emc-container-2" class=" animated slideInUp">
	<div id="ajax-table">
	<table style="width: 100%; margin-left: auto;margin-right: auto;" id="emc-table">
		<tr>
			<td>
				ID:<br>
				<input type="text" class="emc-txtfield readonly" name="EmployeeID" readonly="readonly" value="" id="empIDTxt">
			</td>
			<td>
				IC Number:<br>
				<input id="empICTxt" type="text" class="emc-txtfield" name="EmployeeIC" onkeypress="return isNumberKey(event); limit(this)">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Name: <br>
				<input id="empNameTxt" type="text" class="emc-txtfield" name="EmployeeName" style="width: 84%">
			</td>
		</tr>
		<tr>
			<td>
				Role:<br>
				<select id="empRoleTxt" class="emc-txtfield" name="role" style="height: 3em" >
					<option value="0"  role="0">Managerial Level</option>
					<option value="1"  role="1" selected="selected">Non-managerial Level</option>
				</select>
			</td>
			<td>
				Password:<br>
				<input id="empPWTxt" type="password" class="emc-txtfield" name="EmployeePin" onkeypress="return isNumberKey(event); limit(this)" maxlength="6" style="text-align: center;letter-spacing: 2em;">
			</td>
		</tr>
		<tr>
			<td>
				Phone Number:<br>
				<input id="empHPTxt" type="text" class="emc-txtfield" name="EmployeePhone" onkeypress="return isNumberKey(event); limit(this)">
			</td>
			<td>
				Email:<br>
				<input id="empEmailTxt" type="email" class="emc-txtfield" name="EmployeeEmail">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Address:<br>
				<textarea id="address" name="Address" class="emc-txtfield" style="width: 40vw; height: 10vw;"></textarea>
			</td>
		</tr>
	</table>
</div>
<div>
	<button id="save" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: none;">Save Changes</button>
	<button id="delete" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: none;">Delete Employee</button>
	<button id="add" class="a-loginBtn" style="margin-right:30px;margin-top:30px;float:right;height: 40px;padding: 5px; border: 1px solid #82B590; background-color: #464646; display: block;">Add Employee</button>
</div>
</div>
</div>
</body>
</html>