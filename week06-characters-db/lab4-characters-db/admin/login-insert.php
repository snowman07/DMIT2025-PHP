<!--Logic should always comes first before the header-->
<?php

    include("/home/adomingo4/data/login-data-characters.php"); // directory for htaccess. /home/adomingo4 - is the root folder "/"
    // this is for increased security
    // On your own... creat a simple Bootstrap form for a usename and password and submit button.  DONE

    // On your own ... please retrieve the data from the form and echo to test. DONE

    $username = trim($_POST['username']); // trim remove spaces before or after the text tring
    $password = trim($_POST['password']);

    //echo "$username, $password";

    // vars here are for bootstrap design
    $msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
    $msgPost = "\n</div>";  

    // if "if" statement is present, critically test it
    if(isset($_POST['mysubmit'])) { // has the button been pushed

    //echo " submit"; //this is a test to show submit word when user click submit

  

        //if(($username == "phil") && ($password =="web123")) {     // <--- from here
        if(($username == $username_good) && (password_verify($password, $pw_enc))) {     // <-- to here  

            //SUCCESS

            //$msg = "Welcome";   // just for testing 
            session_start();
            $_SESSION['aasdffrtgfbqw'] = session_id(); // make as random as possible

            header("Location: insert.php");  //remember to disable this if you are debugging!!

        } else {
            $msg = "Incorrect Login";
        }
    
    } else {
        if ($username != "" && $password != "") {

        } else {
            $msg = "Please enter username and password";
        }

    }

?>

<?php
  include("../includes/header.php");
?>

<div class="container">
    <div class="jumbotron clearfix">
        <h1>Login to Insert Characters</h1>
    </div>
</div>




<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    
    <?php
        if($msg) {
            echo $msgPreSuccess.$msg.$msgPost;
        }
    ?>
    
    <div class="form-group">
        <label for="username">Name</label>
        <input
            type="text"
            class="form-control"
            name="username"
            placeholder="Enter username here"
        />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input
            type="password"
            class="form-control"
            name="password"
            placeholder="Enter password here"
        />
    </div>

    <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
    Login
    </button>
    <p>&nbsp;</p>
</form>

<?php
    include("../includes/footer.php");
?>