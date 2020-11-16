<?php
include("header.php");
?>

<div id="results">

<h2>Basic Filtering of MySQL Query Results</h2>
<?php
/*
In this work though, we'll do the following:
1) See how we can get selective (filtered) results from a MySQL Database.
2) See how we can create the web interface that allows these filtered results to be accessed from links (with attached query strings).
3) See the how the MySQL BETWEEN operator can select a range of results, and then build that into our interface.

This will allow us to do basic filtering (one field only) from a web interface for a small database.
Larger and more complex projects would require more complex queries using MySQL operators such as AND, OR, etc., and would require much more complex PHP logic to build the interface.

*/

// HERE IS THE DEFAULT QUERY: IF NOTHING BELOW THEN THIS QUERY WILL STAND; OTHERWISE, IT WILL BE OVERWRITTEN
$sql = "SELECT * FROM dogs";// SHOW EVERYTHING

// here we can overwrite the previous query.
/***********************************************
 Step 1) On your own....uncomment the following queries one at a time to see the results.
***********************************************/
// $sql = "SELECT * FROM dogs WHERE size LIKE 'large'";// SHOW ONLY LARGE DOGS
// $sql = "SELECT * FROM dogs WHERE size LIKE 'medium'";// SHOW ONLY MEDIUM DOGS
// $sql = "SELECT * FROM dogs WHERE guard LIKE '1'";// SHOW ONLY GOOD GUARD DOGS
// $sql = "SELECT * FROM dogs WHERE lowshedding  LIKE 'yes'";// SHOW ONLY LOWSHEDDING DOGS
// $sql = "SELECT * FROM dogs WHERE children  LIKE 'yes'";// SHOW ONLY GOOD DOGS WITH CHILDREN


// $sql = "SELECT * FROM dogs WHERE intelligence BETWEEN '1' AND '3'";// SHOW ONLY STUPID DOGS
// $sql = "SELECT * FROM dogs WHERE intelligence BETWEEN '4' AND '7'";// SHOW ONLY MEDIUM INTELLIGENCE DOGS
// $sql = "SELECT * FROM dogs WHERE intelligence BETWEEN '8' AND '10'";// SHOW ONLY SMART DOGS

/***********************************************
 Step 2) On your own... manually pass a query string (index.php?displayby=size&displayvalue=large) in the address bar or your browser to see the results.
 
 Please check the results with the actual database table to make sure the filtered results are correct. Feel free to change anything you like in the output to view results better.
 
 If you understand how this works, then please create an HTML link in the header.php file "Links" section for each of the different "categories" of dogs (large, small, lowshedding, guard, good with children, etc.)
***********************************************/
$displayby = $_GET['displayby'];
$displayvalue = $_GET['displayvalue'];

if($displayby && $displayvalue){
	$sql = "SELECT * FROM dogs WHERE $displayby LIKE '$displayvalue'";
}


/*************************************************
Step 3) If you understand how we did Step 2 with two query string variables, then create your own logical if/then statement here and three query string variables for "intelligence". One way would be to pass 'displayby=intelligence' as one var, then '&min=1&max=4' as 2 more. If this is the case, then have a special BETWEEN query here that overwrites the previous and let's us filter a range.
***************************************************/
// $var1 = $_GET['var1'];
// $var2 = $_GET['var2'];
// $var3 = $_GET['var3'];
// if(){
	// $sql = "SELECT * FROM dogs WHERE...";
// }

$result = mysqli_query($con,$sql); //OK. Let's run whatever query we have set above.
echo "<h3>". $sql ."</h3>";// As well, let's see the actual query over the results (for our learning purposes only...NOT for the final product).


if(!$result){ // THIS IS ONE WAY TO DEAL WITH A BAD QUERY SOMEHOW; WILL NOT SECURE OUR DB, BUT WILL DEGRADE GRACEFULLY FOR USER.
	echo "\n<p>Bad Query</p>\n";
	include("footer.php");
	exit();
}
	// HANDLING NO RESULTS FROM A QUERY
if(mysqli_num_rows($result)==0){
  echo "<h1>Nothing to Show</h1>";
}
 // DISPLAY RESULTS: Only relevant results thumbnails should be displayed.
while ($row = mysqli_fetch_array( $result )){
  $breed = $row['breed'];
  $pooch_id = $row['pooch_id'];
  $image_file = $row['image_file'];
  echo "\n<div class=\"thumb\">";
	echo "<a href=\"breed.php?pooch_id=$pooch_id\"><img src=\"images/thumbs100/$image_file\" /></a><br />";
	echo "<a href=\"breed.php?pooch_id=$pooch_id\">$breed</a><br />\n";
  echo "\n</div>";
}

?>





<?php
include("footer.php");
?>

