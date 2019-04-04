<?php
session_start();
if($_SESSION['role']==="0"){
	header("Location: ../mainmenu-admin.php");
}
else if($_SESSION['role']==="1"){
	header("Location:../mainmenu-employee.php" );
}
?>