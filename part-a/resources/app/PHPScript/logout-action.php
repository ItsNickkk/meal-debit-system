<?php session_start();
echo '<script type="text/javascript" src="../JS/someFunction.js"></script>';
echo '<script>resize(400,500);</script>';

if(isset($_SESSION['loggedin'])==true){
	session_unset();
	session_destroy();
	echo '<script>resize(400,500);</script>';
	header('Location:../index.html');

}
else{
	echo"<script>alert(\"You're not logged in!\");</script>";
	echo '<script>resize(400,500);</script>';
	header('Location:../index.html');
}



?>