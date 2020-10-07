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
    

        // Now, we want to READ tha data from DB. We use a SELECT statement

        $result = mysqli_query($con, "SELECT * FROM test");

        // Now, we have to loop thru all records and display to the user

        while($row = mysqli_fetch_array($result)){
            echo $row["username"] . "<br>"; // $row["name-of-column"]
            echo $row["address"] . "<br>";
            echo $row["occupation"] . "<br>";
            echo "<hr>"; // hr = horizontal row
        }
    ?>
    
</body>
</html>