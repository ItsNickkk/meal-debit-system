<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout</title>
</head>

<body>
	
	<?php
	
		session_unset();
		session_destroy();
	
	?>
	
	<script>location.href="../home.php"</script>
	
</body>
</html>