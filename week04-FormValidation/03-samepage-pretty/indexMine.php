<?php
    /*
    On your own... 
    create a bootstrap form with the following fields:
        username - text
        email - text
        province - select please include all provinces and their codes
        gender - radio buttons
        newsletter - checkbox
        comment - text area
        submit - it button*/

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Bootstrap</title>

    <style type="text/css">
      form {
        max-width: 450px;
      }
    </style>
    
  </head>
  <body>

    <h1>Bootstrap Forms</h1>

    <form name="myform" method="post" action="#">
    <div class="form-group">
        <label for="username">Username</label>
        <input
        type="text"
        class="form-control"
        name="username"
        placeholder="Enter username here"
        />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input
        type="text"
        class="form-control"
        name="email"
        placeholder="Enter email here"
        />
    </div>
    <div class="form-group">
        <label for="province">Province</label>
        <select class="form-control" name="province">
            <option value="">Select country...</option>
            <!--this serve as the placeholder-->
            <option value="AB">Alberta</option>
            <option value="BC">British Columbia</option>
            <option value="MB">Manitoba</option>
            <option value="NB">New Brunswick</option>
            <option value="NL">Newfoundland and Labrador</option>
            <option value="NS">Nova Scotia</option>
            <option value="ON">Ontario</option>
            <option value="PE">Prince Edward Island</option>
            <option value="QC">Quebec</option>
            <option value="SK">Saskatchewan</option>
            <option value="NT">Northwest Territories</option>
            <option value="NU">Nunavut</option>
            <option value="YT">Yukon</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="gender">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" />
          <label class="form-check-label" for="gender"> Male </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" />
          <label class="form-check-label" for="gender"> Female </label>
        </div>
        <!--Male:
        <input
        type="radio"
        class="custom-control-label"
        name="gender"
        value="Male"
        />
        Female:
        <input
        type="radio"
        class="custom-control-label"
        name="gender"
        value="Female"
        />-->
    </div>
    <!--<div class="form-check">
        <input class="form-check-input" type="checkbox" name="newsletter" />
        <label class="form-check-label" for="newsletter"> Newsletter </label>
    </div>-->
    <div class="form-group">
        <label for="country">Newsletter</label>
        <input
        type="checkbox"
        class="custom-control-label"
        name="newsletter"
        value="newsletter"
        />
    </div>
    
    <div class="form-group">
        <label for="comments">Comments</label>
        <textarea class="form-control" name="comments" rows="3"></textarea>
    </div>
    
    <div>&nbsp;</div>
    <!-- space before button -->

    <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
        Submit
    </button>
    </form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>