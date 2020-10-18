<?php
    include ("includes/header.php");

    $searchterm = trim($_POST["term"]);
    //echo $term;

?>

<div class="container">
    <div class="jumbotron clearfix">
        <h1>Search Characters</h1>
    </div>
</div>

<h2>Type here:</h2>

<form method="post" action="search.php">
    <input type="text" name="term">
    <input type="submit" name="mysubmit" value="Search">
</form><br><br>

<?php

    if(isset($_POST['mysubmit']) && $searchterm != "") {

        $sql = "SELECT * FROM harry_potter WHERE
                first_name LIKE '$searchterm'
                OR last_name LIKE '$searchterm'
                OR description LIKE '%$searchterm%'"; // % - wildcard


        $result = mysqli_query($con, $sql);

        // Lets deal with NO results from this query

        if (mysqli_num_rows($result) > 0) {

            // Now, we have to loop thru all records and display to the user

            while($row = mysqli_fetch_array($result)){
                // echo $row["username"] . "<br>"; // $row["name-of-column"]
                // echo $row["address"] . "<br>";
                // echo $row["occupation"] . "<br>";
                // echo "<hr>"; // hr = horizontal row

                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $description = $row['description'];

                //echo $first_name;

                // for this project, we will simply echo all the output html. In future projectc, we will use Alt syntax
                // (ternary operators, etc.), for more HTML and less ECHO
                echo "\n<h2>$first_name $last_name</h2>";
                echo "\n<div><b>Description: </b><br><em>$description</em></div>";
                echo "<br><br>";
            } // end of while 
        } else {
            echo "\n<div class=\"alert alert-warning\">No results</div>\n";
        }
    } // end of if
?>



<?php
    include ("includes/footer.php");
?>