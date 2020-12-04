<!------THIS IS FOR THE REQUIREMENTS IN DOCUMENT PLANNING------------>

<!DOCTYPE html>

<html>
<head>
<title>CD Collection</title>
<style type="text/css">
body {
	font-family: verdana, arial;
	font-size: 90%;
}
.thisCD {
	border: 1px solid #999;
	padding: 10px;
	margin-top:10px;
	/*
	height: 150px;*/
	width: 400px;
	
}
.displayCategory {

	font-weight: bold;
	color: #009;
}
.displayInfo{

	font-weight: normal;
	color: #900;
}
.cdImage {
	float: right;
}
.displayDescription {
	font-size: 85%;
	padding: 7px;
}
.clearFix {
	clear: both;
}
#main{
	width: 500px;
	float:left;
}
#rightcol{
	float:right;
	top: 0px;
	border: 1px solid #900;	
	width: 400px;
	padding: 7px;
}
</style>

</head>
<body>

<div id="rightcol">
	<h2>FILTER AREA</h2>

	<a href="display.php">ALL PLANTS</a><br />
	<a href="display.php?displayby=plant_size&displayvalue=small">Small Plants</a><br />
	<a href="display.php?displayby=plant_size&displayvalue=large">Large Plants</a><br />

	<!--
	TASK: Here, create several links for the following:
	- 3 more genre links -->
	<a href="display.php?displayby=plant_indoor&displayvalue=yes">Indoor Plants</a><br />
	<a href="display.php?displayby=plant_inventory&displayvalue=instock">Available Plants</a><br />

</div>

<div id="main">

	<?php
		require("mysql_connect.php");


		// DEFAULT QUERY: RETRIEVE EVERYTHING
		$result = mysqli_query($con,"SELECT * FROM plant_catalog") or die (mysql_error());

		// FILTERING YOUR DB
		$displayby = $_GET['displayby'];
		$displayvalue = $_GET['displayvalue'];

		if(isset($displayby) && isset($displayvalue)) {
			// HERE IS THE MAGIC: WE TELL OUR DB WHICH COLUMN TO LOOK IN, AND THEN WHICH VALUE FROM THAT COLUMN WE'RE LOOKING FOR
			$result = mysqli_query($con,"SELECT * FROM plant_catalog WHERE $displayby LIKE '$displayvalue' ") or die (mysql_error());
			
		}

		/************************** ECHO OUT YOUR RESULTS ***********************/
		while ($row = mysqli_fetch_array($result)) {
			$id = ($row['id']);
			$plant_name = ($row['plant_name']);
			$plant_description = ($row['plant_description']);
			$plant_price = ($row['plant_price']);
			$plant_size = ($row['plant_size']);
			$plant_type = ($row['plant_type']);
			$plant_indoor = $row['plant_indoor'];
			$inventory = ($row['inventory']);
			//echo "<div class=\"thisCD\">\n";

			//echo "<img src=\"artwork/thumbs100/$artwork\" class=\"cdImage\" />";

			echo "<span class=\"displayCategory\">Plant Name:</span> <span class=\"displayInfo\">". $plant_name ."</span><br />\n";
			echo "<span class=\"displayCategory\">Description:</span> <span class=\"displayInfo\">". $plant_description ."</span><br />\n";
			echo "<span class=\"displayCategory\">Price: $</span> <span class=\"displayInfo\">". $plant_price ."</span><br />\n";
			echo "<span class=\"displayCategory\">Size:</span> <span class=\"displayInfo\">". $plant_size ."</span><br />\n";
			
			
			// CREATE A "detail.php" PAGE FOR A SINGLE ITEM VIEW; SHOW ALL INFO FOR THIS CD
			echo "<a href=\"detail.php?id=$id\">More info...</a><br />";
			
		// echo "<div class=\"clearFix\"></div>\n";
		// echo "\n</div>\n";
		}
	?>
</div>




<?php

	// DISPLAY RESULTS: Only relevant results thumbnails should be displayed.
	while ($row = mysqli_fetch_array( $result )){
		$plant_name = $row['plant_name '];
		$id = $row['id'];
		echo "<a href=\"detail.php?id=$id\">$plant_name</a><br />\n";
		
	}

?>







</body>
</html>

