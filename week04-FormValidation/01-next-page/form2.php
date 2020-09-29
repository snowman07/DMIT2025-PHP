<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <title>Post</title>

    <!--reducing the width of the form on desktop-->
    <style type="text/css">
      form {
        max-width: 450px;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <h1>Receiving Form Data using POST</h1>

        <?php

        if(isset($_POST['username'])) {
            //the "name" of the form element(Username) from formsend.html is what we access here!
            echo "<p><b>Name: </b>" . $_POST['username'] . "</p>";
        }
        if(isset($_POST['phone'])) {
            echo "</p><b>Phone: </b>" . $_POST['phone'] . "</p>";
        }
        if(isset($_POST['email'])) {
            //the "name" of the form element(Password) from formsend.html is what we access here!
            echo "</p><b>Email: </b>" . $_POST['email'] . "</p>";
        }
        if(isset($_POST['message'])) {
            echo "</p><b>Message: </b>" . $_POST['message'] . "</p>";
        }


        /*What are we doing here is only an academic exercise. Not to be used for real */

        /*Here we will build "validation rules" that can stop the submission of this form until user has fixed errors*/
        

        // check for empty fields

        if($username == ""){
          echo "Please fill in your name:";
          exit(); // leaves the current script. Very dangerous as when you forget about this, nothing else below will work
        }
        if(strlen($username) == ""){
          echo "Please fill in your name:";
          exit(); // leaves the current script. Very dangerous as when you forget about this, nothing else below will work
        }

        //max string Length
        if(strlen($username) > 20) {
          echo "Please fill in your name of less than 21 characters.<br>:";
          exit(); // leaves the current script. Very dangerous as when you forget about this, nothing else below will work
        }

        // email format validatio

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "Please fill in a correct email.<br>";
          exit(;)
        }

         /*SIMPLE WAY TO DO THIS:
        
          $username = $_POST['username'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $message = $_POST['message'];

          echo "$username, $phone, $email, $message";
        */

        // here we will build a custom phone number validator... just for fun(learning). Best to now use this for real as it assumes a North American format phone

        //lets modify the phone number, then check it for what we need

        $phone = str_replace(" ", "", $phone); // removing spaces
        $phone = str_replace("_", "", $phone) // removing spaces
        $phone = str_replace("(", "", $phone) // removing spaces
        $phone = str_replace(")", "", $phone) // removing spaces
        $phone = str_replace(".", "", $phone) // removing spaces

        if(is_numeric($phone)) {
          echo "That phone is not a number";
          exit();
        }
        if(strlen($phone) != 10) { // 780 728 1234
          echo "Please enter the 10 digit number";
          exit();
        }

        //echo $phone;


        // Message field. What val do we need?
        if((strlen($message) < 10) || strlen($message) > 200) {
          echo "Please enter a message between 10 and 200 characters";
          exit();
        }
        $message = strip_tags($message); // removes unwanted HTML formatting.
        echo $message;



        ?>

        <h1>Wohoo. Validation passed.<h1>

    </div>
    <!--end of container class-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
