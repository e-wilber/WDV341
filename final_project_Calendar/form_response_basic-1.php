
<!doctype html>
<html>
<head>
	<!--Erin Wilber 4 Dec. 2023-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>contact form response - Savanna's</title>
<link href="style.css" rel="stylesheet">
<style type="text/css">
#container  {
			width: 800px;
			border: 1px solid black;
			padding: 10px;
			margin: 10px auto;
			}
body{
	color: black;
	background-color: cadetblue;
}
.colorRed {
	color: #F00;
}
</style>
</head>

<body>
<div id="container">
<h1>Savanna's Coffee House</h1>
<h2>Form Response Porcessor</h2>

</div><!--close div container-->

<p>Customer Information</p>
<hr>
<p>&nbsp;</p>

<?php

echo "<p class='colorBlack'>This page was created by PHP on the server and sent back to your browser. </p>";

//It will create a table and display one set of name value pairs per row
	echo "<table border='1'>";
	echo "<tr><th>Label</th><th>Input</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

?>

</body>
</html>
