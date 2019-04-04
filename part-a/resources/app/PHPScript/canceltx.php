<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.canceltxtxt{
			background-color: #2c2f33;
			border: none;
			border-bottom: 2px solid #82B590;
			width: 300px;
		}
		.submit-btn{
			border: 2px solid #82B590;
			background-color: #2c2f33;
			padding: 5px;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
		}
		.submit-btn:hover{
			background-color: #82B590;
		}
	</style>
	<script>
 function show(aval) {
    if (aval == "Orange") {
    hiddenDiv.style.display='inline-block';
    Form.fileURL.focus();
    } 
    else{
    hiddenDiv.style.display='none';
    }
  }
	</script>


</head>
<body id="body" class="bg-col">
<div style="background-color: #2c2f33; margin: -15px -30px -15px -30px; border-radius: 5px; padding: 50px">
<?php
$id = $_GET['txid'];
$custid=$_GET['custid'];
?>
Transaction ID:<br>
<form action="phpscript/canceltx-action.php" method="post">

<input type="text" value="<?php echo $id; ?>" style="color: grey; padding-left: 5px;" name="txid" class="canceltxtxt" required readonly><br><br>
<input type="text" value="<?php echo $custid; ?>" style="display: none;" name="custid" required readonly>


Reason:<br>
<select name="reasonCombo" class="canceltxtxt" style="width: 310px;" id="reason" required="required" onchange="java_script_:show(this.options[this.selectedIndex].value)">
	<option value="item">Incorrect Item Type</option>
	<option value="qty">Incorrect Quantity</option>
	<option value="other">Other Reasons, please specify</option>
</select> <br><br>
<div id="otherreasons" style="display: none">
Specify your reason:<br>
<input name="reasonTxt" type="text" class="canceltxtxt" id="otherreasons">
</div><br><br>
<input class="submit-btn" type="submit" name="submit" value="Submit">
</div>
</form>
</div>
	<script>
 function show(val) {
    if (val == "other") {
    document.getElementById('otherreasons').style.display='inline-block';
    } 
    else{
    document.getElementById('otherreasons').style.display='none';
    }
  }
	</script>
</body>
</html>