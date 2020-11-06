<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--this will display the image from -->
    <?php
        include("mysql_connect.php");
    ?>

    <?php $result = mysqli_query($con, "SELECT * FROM arr_uploads"); ?>
    <?php while($row = mysqli_fetch_array($result)): ?>
        <div style="width:300px; float:left; margin:10px">
            <img src="thumbs/<?php echo $row["arr_filename"]; ?>" >
        </div>
    <?php endwhile; ?>
    
</body>
</html>