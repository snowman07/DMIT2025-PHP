<?php
  include ("mysql_connect.php");
?>

<?php
    $searchtext = trim($_POST["searchtext"]);
?>

<?php 
    //include ("includes/search.php");
    if(isset($_POST['searchsubmit']) && $searchtext != "") {
    $sql = "SELECT * FROM plant_catalog WHERE
        plant_name LIKE '$searchtext' ";

    $result = mysqli_query($con, $sql);
    // Lets deal with NO results from this query
    if (mysqli_num_rows($result) > 0) {
        // Now, we have to loop thru all records and display to the user
        while($row = mysqli_fetch_array($result)) {
        $plant_name = $row['plant_name'];
        $plant_price = $row['plant_price'];
        $plant_size = $row['plant_size'];
        

        
        echo "<div class=\"square-img\">";
            echo "<center><b>" .$row["plant_name"] ."</center></b><br />\n";
            echo "<b>Price: $ </b>". $row["plant_price"] ."<br />\n";
            echo "<b>Size: </b>". $row["plant_size"] ."<br />\n";
        echo "</div>";

        // echo "<center><b>" .$row["plant_name"] ."</center></b><br />\n";
        // echo "<b>Price: $ </b>". $row["plant_price"] ."<br />\n";
        // echo "<b>Size: </b>". $row["plant_size"] ."<br />\n";
        
        } // end of while
    } else {
        echo "\n<div class=\"alert alert-warning\">No results</div>\n";
    }
    } // end of if 
?>