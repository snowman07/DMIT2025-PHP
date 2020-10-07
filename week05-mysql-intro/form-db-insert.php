<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // CONNECTION MUST BE IN THIS FILE!!!!
    // servername, username, password, db-name (NOT the table name)
    $con = mysqli_connect("localhost", "adomingo4", "PDsbNesMr3sSS79", "adomingo4_dmit2025");

    if(isset($_POST['mysubmit'])) {
        $username = trim($_POST['username']);
        $address = trim($_POST['address']);
        $occupation = trim($_POST['occupation']);

        mysqli_query($con, "INSERT INTO test(username, address, occupation) VALUES('$username', '$address', '$occupation')") or die(mysqli_error($con));
    }
    
    
    
    ?>
    <!--On your own, build a form that allows the user to enter a new username, address, occupation
        Dont worry about the validation or Bootstrap. Just a simple form-->
    <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">

        <div class="form-group">
            <label for="username">Name:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter name here" value="<?php echo $name; // prepopulate the value type text input?>">   
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" placeholder="Enter address here" value="<?php echo $name; // prepopulate the value type text input?>">   
        </div>
        <div class="form-group">
            <label for="occupation">Occupation:</label>
            <input type="text" class="form-control" name="occupation" placeholder="Enter occupation here" value="<?php echo $name; // prepopulate the value type text input?>">   
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary" name="mysubmit">Submit</button>
        <!-- End of Submit button -->

    </form>

</body>
</html>