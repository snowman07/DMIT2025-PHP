<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Functions</title>
</head>
<body>
    <?php
        /*Custom Functions
        
        function myFunction() {
            //whatever you want to do
            //as many lines of code as you like
        }

        */
        $myWord = $_POST['myinput'];
        //echo $myWord;

        //BASIC FUNCTIONS
        function doStuff(){
            echo "<p>This is the function being called.</p>";
            echo "<style>body{background-color:fuchsia}</style>";
        }
        // A simple condition. Based on this, we will call the function or not
        if($myWord == "arr") {
            doStuff();  // here we call the custom function
        } else {
            echo "<p> That is NOT the magic word</p>";
        }


    ?>
    <h1>PHP Custom Functions</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <input type="text" name="myinput">
        <input type="submit" name="mysubmit">

    </form>
</body>
</html>