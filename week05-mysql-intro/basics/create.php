<!-- week05day01 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // servername, username, password, db-name (NOT the table name)
        $con = mysqli_connect("localhost", "adomingo4", "PDsbNesMr3sSS79", "adomingo4_dmit2025");
    
        // Now, lets use INSERT
        mysqli_query($con, "INSERT INTO test(username, address, occupation) VALUES('BamBam1 Rubble', '456 Bedrock Avenue', 'Child')") or die(mysqli_error($con));

        //save, upload, and run this file ONCE only
        // then, go back to read.phpand see if you have a new item
    ?>

</body>
</html>