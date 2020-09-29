<!--This is a tutorial for PHP variables and operations-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable and Operators</title>
</head>
<body>


    <h1>Tutorial for variables and operators</h1>

    <?php

    $firstName = "Dirk";
    $lastName = "Diggler";

    //in php, we can access variables inside text string
    echo "\n<p>The first name is $firstName $lastName</p>";
    echo "\n<p>The values of those variables are " . $firstName ." " . $lastName . ".</p>";
    echo "<h1>This is an H1 inside PHP blocks</h1>"

    ?>


    <!--This is another PHP block-->
    <h3>The Append Operator .=</h3>

    <?php

    $thisName = "Arr";
    $thisName .= " Domingo";
    echo $thisName;
    
    ?>
    <!--End of another PHP block-->

    
    <!--This is another PHP block-->
    <h3>Numeric Values & Operators</h3>
    <?php

    
    $num1 = 5;
    $num2 = 2;

    echo "<h4>Addition:</h4>";
    $num3 = $num1 + $num2;
    echo "Addition result is $num3";

    echo "<h4>Subtraction:</h4>";
    $num3 = $num1 - $num2;
    echo "Subtraction result is $num3";

    echo "<h4>Multiplication:</h4>";
    $num3 = $num1 * $num2;
    echo "Multiplication result is $num3";

    echo "<h4>Division:</h4>";
    $num3 = $num1 / $num2;
    echo "Division result is $num3";

    echo "<h4>Modulo:</h4>";
    $num3 = $num1 % $num2;
    echo "Modulo result is $num3";

    echo "<h4>This is increment</h4>";
    $x = 7;
    $x++; //increment
    echo "The number is $x";
    
    ?>
    <!--End of another PHP block-->


    <!--This is another PHP block-->
    <h3>Logical and Comparison Operators</h3>
    <?php
    echo 5 == 5; // this will result to true or 1
    echo "<br>";

    echo ((5>3) && (2<4)); //this will result to true or 1

    ?>
    <!--End of another PHP block-->

</body>
</html>