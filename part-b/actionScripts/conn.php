<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>conn.php</title>
  </head>
  <body>
    <?php

	  	$con = mysqli_connect("localhost", "root", "root", "meal-debit-system");

		if(mysqli_connect_errno())
    	{
    	echo "Failed to connect to MySQL: ".mysqli_conect_error();
    	}
    ?>
  </body>
</html>
