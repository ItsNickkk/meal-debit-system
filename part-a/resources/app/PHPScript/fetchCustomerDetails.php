<?php
include('conn.php');
$id =mysqli_real_escape_string($con, $_POST['id']);
$sql = "SELECT * FROM customer WHERE customerID = ".$id;
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)<=0){
	echo "<script>alert('An error occured".$sql."');</script>";
}
$row=mysqli_fetch_array($result);

echo '	<table style="width: 100%; margin-left: auto;margin-right: auto;" id="emc-table">
        <tr>
            <td>
                ID:<br>
                <input type="text" class="emc-txtfield readonly" readonly="readonly" value="'.$row['customerID'].'" id="custIDTxt">
            </td>
            <td>
                IC Number:<br>
                <input id="custICTxt" type="text" class="emc-txtfield readonly" readonly="readonly" onkeypress="return isNumberKey(event); limit(this)" value="'.$row['customerIC'].'">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Name: <br>
                <input id="custNameTxt" type="text" class="emc-txtfield readonly" readonly="readonly" style="width: 84%" value="'.$row['customerName'].'">
            </td>
        </tr>
        <tr>
            <td>
                Balance:<br>
                <input id="custBalTxt" type="text" class="emc-txtfield" onkeypress="return isNumberKey(event); limit(this)" maxlength="10" value="'.$row['customerBalance'].'">
            </td>
            <td>
                Username:<br>
                <input id="custUserTxt" type="text" class="emc-txtfield readonly" readonly="readonly" value="'.$row['customerUsername'].'">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:<br>
                <input id="custHPTxt" type="text" class="emc-txtfield readonly" readonly="readonly" onkeypress="return isNumberKey(event); limit(this)" value="'.$row['customerPhone'].'">
            </td>
            <td>
                Email:<br>
                <input id="custEmailTxt" type="email" class="emc-txtfield readonly" readonly="readonly" value="'.$row['customerEmail'].'">
            </td>
        </tr>
    </table>';






?>