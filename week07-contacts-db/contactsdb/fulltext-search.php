<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
		<input type="text" name="searchterm">
		<input type="submit" name="mysubmit">
	</form>
	<?php 
	/*

You may have to do this to index a certain column (in SQL tab): ALTER TABLE table_name ADD FULLTEXT(column_name);
Table storage format Must be MYISAM: Can access this in phpMyAdmin under Operations > Table Options

*/

	if(isset($_POST['mysubmit'])){
		
		//echo $searchterm;
		$con = mysqli_connect("localhost", "adomingo4","PDsbNesMr3sSS79","adomingo4_dmit2025");

		$searchterm = mysqli_real_escape_string($con, $_POST['searchterm']); 
		// add more columns here so you can search them
		$sql = "SELECT * FROM cd_catalog_class WHERE MATCH (title,description) AGAINST ('$searchterm' IN BOOLEAN MODE)"; //fulltext searching


		echo "search results for <b>$searchterm</b>";
		$result = mysqli_query($con,$sql) or die (mysqli_error($con));
			
		while ($row = mysqli_fetch_array( $result )){
			
			$title = $row['title'];
			$artist = $row['artist'];
			$description = $row['description'];
			
	
			
			echo "<p>". $title . "</p>";
			echo "<p>". $artist . "</p>";
			echo "<p>". $description . "</p><br>";
			}
		

	}





	 ?>
</body>
</html>