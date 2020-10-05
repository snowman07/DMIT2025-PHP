<?php

    if(isset($_POST["mysubmit"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $address = trim($_POST["address"]);
        $city = trim($_POST["city"]);
        $province = trim($_POST["province"]);
        $country = trim($_POST["country"]);
        $comments = trim($_POST["comments"]);
        $website = trim($_POST["website"]);
        $gender = trim($_POST["gender"]);
        $newsletter = trim($_POST["newsletter"]);

        //echo "1$name, 2$email, 3$password, 4$address, 5$city , 6$province, 7$country, 8$comments, 9$website, 10$gender, 11$newsletter";
    } 
    // END of mysubmit

    $successMsg = "Successfully submitted the form";
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Lab3 - Form Validation</title>

    <style>
        body {
            background-color: lightblue;
        }
        .container {
            margin-top: 50px;
            max-width: 650px;
            padding: 30px;
            border: 3px #0B8997;
            background-color: #DBEAFA;
        }
        h1 {
            text-align: center;
            padding-bottom: 30px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <h1>PHP Form Validation</h1>

        <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Name: -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name here" value="<?php echo $name; // prepopulate the value type text input?>">
                    </div>
                    <!-- END of Name -->

                    <!-- Email address: -->
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address here" value="<?php echo $email; ?>"> 
                    </div>
                    <!-- END of Email address -->

                    <!-- Password: -->
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password here">
                    </div>
                    <!-- END of Password -->
                    
                    <!-- Address: -->
                    <div class="form-group">
                        <label for="address">Adress:</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address here" value="<?php echo $address; ?>"> 
                    </div>
                    <!-- END of Address -->

                    <!-- City: -->
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter city here" value="<?php echo $city; ?>"> 
                    </div>
                    <!-- END of City -->
                </div> <!--end of col-sm-6-->
                <div class="col-sm-6">
                    <!-- Province: -->
                    <div class="form-group">
                        <label for="province">Province:</label>
                        <select name="province" class="form-control">
                            <option value="">---Select province---</option>
                            <option value="AB" <?php if(isset($province) && $province == "AB") {echo "selected";} ?>>Alberta</option>
                            <option value="BC" <?php if(isset($province) && $province == "BC") {echo "selected";} ?>>British Columbia</option>
                            <option value="MB" <?php if(isset($province) && $province == "MB") {echo "selected";} ?>>Manitoba</option>
                            <option value="NB" <?php if(isset($province) && $province == "NB") {echo "selected";} ?>>New Brunswick</option>
                            <option value="NL" <?php if(isset($province) && $province == "NL") {echo "selected";} ?>>Newfoundland and Labrador</option>
                            <option value="NS" <?php if(isset($province) && $province == "NS") {echo "selected";} ?>>Nova Scotia</option>
                            <option value="ON" <?php if(isset($province) && $province == "ON") {echo "selected";} ?>>Ontario</option>
                            <option value="PE" <?php if(isset($province) && $province == "PE") {echo "selected";} ?>>Prince Edward Island</option>
                            <option value="QC" <?php if(isset($province) && $province == "QC") {echo "selected";} ?>>Quebec</option>
                            <option value="SK" <?php if(isset($province) && $province == "SK") {echo "selected";} ?>>Saskatchewan</option>
                            <option value="NT" <?php if(isset($province) && $province == "NT") {echo "selected";} ?>>Northwest Territories</option>
                            <option value="NU" <?php if(isset($province) && $province == "NU") {echo "selected";} ?>>Nunavut</option>
                            <option value="YT" <?php if(isset($province) && $province == "YT") {echo "selected";} ?>>Yukon</option>
                            <!-- if(isset($province) && $province == "AB") {echo "selected";}  to prepop select options -->
                        </select>
                    </div>
                    <!-- END of Province -->

                    <!-- Country: -->
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select name="country" class="form-control">
                            <option value="">---Select country---</option>
                            <option value="CA" <?php if(isset($country) && $country == "CA") {echo "selected";} ?>>Canada</option>
                            <option value="UK" <?php if(isset($country) && $country == "UK") {echo "selected";} ?>>United Kingdom</option>
                            <option value="SG" <?php if(isset($country) && $country == "SG") {echo "selected";} ?>>Singapore</option>
                            <option value="PH" <?php if(isset($country) && $country == "PH") {echo "selected";} ?>>Philippines</option>
                            <option value="IN" <?php if(isset($country) && $country == "IN") {echo "selected";} ?>>India</option>
                            <!-- if(isset($province) && $province == "AB") {echo "selected";}  to prepop select options -->
                        </select>
                    </div>
                    <!-- END of Country -->

                    <!-- Comments -->
                    <div class="form-group">
                        <label for="comments">Comments:</label>
                        <textarea name="comments" class="form-control" rows="2"><?php if($comments) {echo $comments;} ?></textarea>
                    </div>
                    <!-- END of Comments -->
                    
                    <!-- Website URL: -->
                    <div class="form-group">
                        <label for="website">Website URL:</label>
                        <input type="text" class="form-control" name="website" placeholder="Enter url here" value="<?php echo $website; ?>">
                    </div>
                    <!-- END of Website URL -->

                    <!-- Gender: -->
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="male" <?php if(isset($gender) && $gender == "male") {echo "checked";} ?>>Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="female" <?php if(isset($gender) && $gender == "female"){echo "checked";} ?>>Female
                            </label>
                        </div>
                    </div>
                    <!-- END of Gender -->

                    <!--Subscribe-->
                    <div class="form-check">
                        <label for="newsletter" class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="newsletter" value="1" <?php if(isset($newsletter) && $newsletter == 1){echo "checked";} ?>>Subscribe to Newsletter
                        </label>
                    </div>
                    <!--END of Subscribe-->
                    <br>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary" name="mysubmit">Submit</button>
                    <!-- End of Submit button -->
                </div> <!--end of col-sm-6-->
            </div> <!--end of row-->
        </form>
    </div> <!--end of "container"-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>