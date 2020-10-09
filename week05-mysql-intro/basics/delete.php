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
    
        // Lets delete an item
        mysqli_query($con, "DELETE FROM test WHERE id = 22") or die(mysqli_error($con)); 
    ?>
</body>
</html>