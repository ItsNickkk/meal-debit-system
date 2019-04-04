<?php
include('conn.php');
$id =mysqli_real_escape_string($con, $_POST['id']);
$sql = "SELECT * FROM employee WHERE employeeID =".$id." and status=1";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)<=0){
	echo "<script>alert('An error occured');</script>";
}
$row=mysqli_fetch_array($result);

echo '	<table style="width: 100%; margin-left: auto;margin-right: auto;" id="emc-table">
		<tr>
			<td>
				ID:<br>
				<input type="text" class="emc-txtfield readonly" name="EmployeeID" readonly="readonly" id="empIDTxt" value="'.$row['employeeID'].'">
			</td>
			<td>
				IC Number:<br>
				<input id="empICTxt" value="'.$row['employeeIC'].'" type="text" class="emc-txtfield" name="EmployeeIC" onkeypress="return isNumberKey(event); limit(this)">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Name: <br>
				<input id="empNameTxt" value="'.$row['employeeName'].'" type="text" class="emc-txtfield" name="EmployeeName" style="width: 84%">
			</td>
		</tr>
		<tr>
			<td>
				Role:<br>
				';
				if($row['employeeRole']== '0'){
				echo '<select id="empRoleTxt" class="emc-txtfield" name="role">
						<option value="0" role="0" selected="selected">Managerial Level</option>
						<option value="1" role="1">Non-managerial Level</option>
					</select>';
				}
				else{
					echo '<select id="empRoleTxt" class="emc-txtfield" name="role" id="role">
						<option value="0" role="0">Managerial Level</option>
						<option value="1" role="1" selected="selected">Non-managerial Level</option>
					</select>';
				}
			echo '</td>
			<td>
				Password:<br>
				<input id="empPWTxt" value="'.$row['employeePassword'].'" type="password" class="emc-txtfield" name="EmployeePin" onkeypress="return isNumberKey(event); limit(this)" maxlength="6" style="text-align: center;letter-spacing: 2em;">
			</td>
		</tr>
		<tr>
			<td>
				Phone Number:<br>
				<input id="empHPTxt" type="text" value="'.$row['employeePhone'].'" class="emc-txtfield" name="EmployeePhone">
			</td>
			<td>
				Email:<br>
				<input id="empEmailTxt" type="email" value="'.$row['employeeEmail'].'" class="emc-txtfield" name="EmployeeEmail">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Address:<br>
				<textarea id="address" name="Address" class="emc-txtfield" style="width: 40vw; height: 10vw;">'.$row['employeeAddress'].'</textarea>
			</td>
		</tr>
	</table>



	';






?>