<?php
include("header.php");
?>



<div id="results">

<h2>Filtered MySQL Query Results</h2>
<?php


$pooch_id = $_GET['pooch_id'];


// HERE IS THE DEFAULT QUERY: IF NO IF/THENS BELOW ARE TRUE THEN THIS QUERY WILL STAND; OTHERWISE, IT WILL BE OVERWRITTEN
$result = mysqli_query($con,"SELECT * FROM dogs WHERE pooch_id = '$pooch_id'");// SHOW EVERYTHING


	// HANDLING NO RESULTS FROM A QUERY
 if(mysqli_num_rows($result)==0){
    echo "<h1>Nothing to Show</h1>";
  }
   
while ($row = mysqli_fetch_array( $result )){

	$breed = $row['breed'];
	 echo "<h2>$breed</h2>";
	$image_file = $row['image_file'];
		echo "<img src=\"images/display_400x300/$image_file\" /><br />";
  
	 
	  echo "<b>Size:</b> ". $row['size']. "<br />";
	  echo "<b>Good with Children:</b> ". $row['children']. "<br />";
	  echo "<b>Intelligence:</b> ". $row['intelligence']. "/10<br />";
	  $description = "Here we might get the description or more info from the DB and write it because we are only showing one item only instead of listing many.";
	  echo $description;
	  $returnToLastQuery = "<p><b><a href=\"". $_SERVER['HTTP_REFERER']. "\">Back</a></b></p>";
	  echo $returnToLastQuery;
	  // IF A USER DECIDES TO VIEW THIS ONE ITEM IN FULL DETAIL, PERHAPS WE COULD CONSIDER THIS AS "POPULAR" AND START RECORDING "HITS"
	 // mysql_query ("UPDATE dogs SET popularity = popularity +1 WHERE pooch_id = '$pooch_id'") or die (mysql_error());


}

?>

<?php
include("footer.php");
?>

