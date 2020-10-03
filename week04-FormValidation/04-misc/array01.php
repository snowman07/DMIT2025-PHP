<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arrays</title>
</head>
<body>
    <h1>PHP Arrays</h1>
    <?php

        $arrFruit = array(); //declare this array; nothing in it yet.
        array_push($arrFruit, "apple", "raspberry", "orange"); //populate with items
        /*
        To visualize an array, we cannot use "echo"
        */
        //echo $arrFruit;   //does not work
        echo "<pre>";   // simple HTML tag that preserve the white space
        print_r($arrFruit);
        echo "</pre>";

        echo "The second item is " . $arrFruit[1];
    ?>
    
</body>
</html>