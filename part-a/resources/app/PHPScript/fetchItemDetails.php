<?php
include('conn.php');
$id = mysqli_real_escape_string($con,$_POST['id']);
$sql = "SELECT * FROM item WHERE itemID =".$id." and status=1";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)<=0){
	echo "<script>alert('An error occured');</script>";
}
$row=mysqli_fetch_array($result);

echo '
	<table style="width: 100%; margin-left: auto;margin-right: auto;" id="emc-table">
        <tr>
            <td colspan="2" style="padding-bottom: 50px;">
                ID:<br>
                <input type="text" class="emc-txtfield readonly" name="EmployeeID" readonly="readonly" value="'.$row['itemID'].'" id="itemIDTxt">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom: 50px;">
                Menu Item Name: <br>
                <input id="itemNameTxt" type="text" class="emc-txtfield" name="EmployeeName" style="width: 84%" value="'.$row['itemName'].'">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 50px;">
                Menu Item Type:<br>
                <input type="text" id="itemTypeTxt" class="emc-txtfield" value="'.$row['itemType'].'">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px;">
                Price:<br>
                <input id="itemPriceTxt" type="text" class="emc-txtfield" name="EmployeePhone" onkeypress="return isNumberKey(event); limit(this)" value="'.$row['itemPrice'].'">
            </td>
        </tr>
		
	</table>






';





?>