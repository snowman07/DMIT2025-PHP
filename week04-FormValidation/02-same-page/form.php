
<?php
if(isset($_POST['mysubmit'])){


    $username = trim($_POST['username']); // remove leading and trailing spaces
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    /*In this exercise, we will have the user
    - stay on the same page to fix errors
    -prepop form values with previous calues
    - shown a cumulative error message */

    //setup a couple of variable
    $valid = 1; // assume everything is OK; validation rules can veto this by setting it to 0;
    $strValMessage = "";

    //username
    if((strlen($username) < 3) || (strlen($username) > 20)){
        strValMessage .= "\n<p>Please fill in a proper name from 3 to 20 characters. </p>";
        $valid = 0;
    }

    //email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "\n<p>Please fill in a proper email address.</p><br>";
        $valid = 0;
      }

    // TEST FOR VALIDATION PASSED OR NOT
    if($valid == 1) {
        $strValMessage = "<h1>SUCCESS</h1>";
    }else {
        //echo "FAIL";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="username" value="<?php echo $username; ?>"><br>
    Phone: <input type="number" name="phone"><br>
    Email: <input type="email" name="email"><br>
    Message: <input type="text" name="username"><br>

    

</form>

<?php

if(strValMessage) {
    echo "<div>$strValMessage</div>";
}
?>


</body>
</html>