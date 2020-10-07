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

        // Lets do update
        mysqli_query($con, "UPDATE test SET address = '789 Main St.' WHERE id = 20") or die(mysqli_error($con));

    ?>
</body>
</html>