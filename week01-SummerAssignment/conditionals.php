<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Conditionals</title>
</head>
<body>
    <h1>PHP Conditionals</h1>
    <?php

    // basic if statements
    if (6>3){
        echo "TRUE";
    } 
    echo "<br>";

    echo "<h4>If else statement</h4>";
    // if/then/else
    if (5>3){
        echo "TRUE";
    } else {
        echo "FALSE";
    }

    ?>

    <h3>Switch Statement</h3>
    <?php
    $x = 2; // initial value is given here. Change this to see the different results.
    switch ($x)
    {
        case 1:
            echo "One";
            break; // the break leaves the current switch statement so nothing else is executed
        case 2:
            echo "Two";
            break;
        case 3:
            echo "Three";
            break;
        default:
            echo "We don't know what that is.";
    }
    

    ?>

</body>
</html>