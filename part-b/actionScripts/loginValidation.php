<?php

	if(!isset($_SESSION['loggedIn'])){
		echo "<script>location.href='loginRegister.php'</script>";
	}

?>
