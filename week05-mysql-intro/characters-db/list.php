<?php
    include ("../includes/header.php");
?>

<h1>List Characters</h1>

<?php


    // Here, lets retrieve and list all our characters

    $result = mysqli_query($con, "SELECT * FROM test");

    // Now, we have to loop thru all records and display to the user

    while($row = mysqli_fetch_array($result)){
        // echo $row["username"] . "<br>"; // $row["name-of-column"]
        // echo $row["address"] . "<br>";
        // echo $row["occupation"] . "<br>";
        // echo "<hr>"; // hr = horizontal row

        $first_name = $row['firstname'];
        $last_name = $row['last_name'];
        $occupation = $row['occupation'];
        $age = $row['age'];
        $description = $row['description'];

        //echo $first_name;

        // for this project, we will simply echo all the output html. In future projectc, we will use Alt syntax
        // (ternary operators, etc.), for more HTML and less ECHO

        echo "\n<h2>$first_name $last_name</h2>";
        echo "\n<div><b>Age: </b>$age</div>";
    }


?>



<?php
    include ("../includes/footer.php");
?>