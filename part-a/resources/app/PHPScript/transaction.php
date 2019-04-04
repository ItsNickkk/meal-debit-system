<?php 
session_start();
$role = $_SESSION['role'];
if($role == '0'){
	header('Location: ../transaction-admin.php');
}
else{
	header('Location: ../transaction-history.php');
}



?>