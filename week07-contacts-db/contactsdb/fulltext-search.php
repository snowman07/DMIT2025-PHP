<?php
  include ("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1>Search Contacts</h1>
  <p class="lead">
    This is where you can do a search.
  </p>
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>
<h2>Full-text search:</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <input type="text" name="searchterm">
    <input type="submit" name="mysubmit" value="Search">
</form>

<?php 
	/*
    You may have to do this to index a certain column (in SQL tab): ALTER TABLE table_name ADD FULLTEXT(column_name);
    Table storage format Must be MYISAM: Can access this in phpMyAdmin under Operations > Table Options
    */

	if(isset($_POST['mysubmit'])){	
		//echo $searchterm;
		// $con = mysqli_connect("localhost", "adomingo4","PDsbNesMr3sSS79","adomingo4_dmit2025");

		$searchterm = mysqli_real_escape_string($con, $_POST['searchterm']); 
		// add more columns here so you can search them
		$sql = "SELECT * FROM arr_contacts WHERE MATCH (arr_bizname, arr_desc) AGAINST ('$searchterm' IN BOOLEAN MODE)"; //fulltext searching

        echo "<br>";
        echo "Search results for: <b>$searchterm</b>";
        echo "<br><br><br>";
		$result = mysqli_query($con,$sql) or die (mysqli_error($con));
            
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array( $result )){
              
            $business_name = $row['arr_bizname'];
            //$your_name = $row['arr_name'];
            // $artist = $row['artist'];
            $description = $row['arr_desc'];
                
            echo "<div class=\"alert alert-info\">"; 
              echo "<br><p><b>Business Name: </b>". $business_name . "</p>";
              // echo "<p>". $your_name . "</p>";
              // echo "<p>". $email . "</p>";
              // echo "<p>". $website . "</p><br>";
              // echo "<p>". $phone_number . "</p><br>";
              // echo "<p>". $address . "</p><br>";
              // echo "<p>". $city . "</p><br>";
              // echo "<p>". $province . "</p><br>";
              echo "<p><b>Description: </b>". $description . "</p><br>";
              //echo "<p>". $newsletter . "</p><br>";
            echo "</div>";

          } // end of while

        } else {
          echo "\n<div class=\"alert alert-warning\">No results</div>\n";
        }
	}
?>

<?php
  include ("includes/footer.php");
?>