<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php include '../actionScripts/conn.php'; ?>
	<script>
	
	function addItem() {
		var ul = document.getElementById("list");
		var li = document.createElement("li");
		li.appendChild(document.createTextNode("Four"));
		ul.appendChild(li);
	}
	
	</script>
	
	<div>
		<ul id="list">
		
		<li class="listItem">item1</li>
		<li class="listItem">item2</li>
		
		
		</ul>
	
	</div>
	
	
	<form method="post">
		
		<input type="text" id="itemID">
		<button onclick="loaction.href='testsite.php?id='">Submit</button>
	</form>
	
	
</body>
</html>