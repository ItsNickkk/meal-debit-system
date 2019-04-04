<!DOCTYPE html>
<html>
<head>
	<title>Main Menu</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/animation.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css"/>
	<script type="text/javascript" src="JS/Validation.js"></script>
	<script type="text/javascript" src="JS/closemaxmin.js"></script>
	<script type="text/javascript" src="JS/someFunction.js"></script>
	<script>resize(1000,700);</script>
	
</head>
<body class="bg-col" style="overflow-y: hidden;overflow-x: hidden;">
<section class="menu-div" style="margin-top: 15%">
	<div class="menu-btn-div"><button class="menu-btn animated slideInLeft" id="pos-btn" onclick="location.href='pos.php'"><br><br><br><br><br>POS Interface</button></div>
	<div class="menu-btn-div"><button class="menu-btn animated slideInDown" id="transaction-hist-btn"  onclick="location.href='phpscript/transaction.php'"><br><br><br><br><br>Transactions</button></div>
	<div class="menu-btn-div"><button class="menu-btn animated slideInRight" id="menu-exit-btn" onclick="location.href='PHPScript/logout-action.php'"><br><br><br><br><br>Exit</button></div>

</section>
</body>
</html>