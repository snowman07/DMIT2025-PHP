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
        
        //variables for bootstrap design for validation
        $preErrorMsg = "\n<div class=\"alert alert-danger\" role=\"alert\">";
        $preSuccessMsg = "\n<div class=\"alert alert-primary\" role=\"alert\">";
        $postMsg = "\n</div>";

        $valid = 1;

        // name validation
        if((strlen($name) < 2) || (strlen($name) > 20)) {
            $valid = 0;
            $valNameMsg = "\nName must be 2-20 characters";
        }
        //echo $valNameMsg;
        // END of name validation

        // email validation
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); // remove unwanted chars
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = 0;
            $valEmailMsg = "\nFill in a proper email address";
		}
        // END of email validation

        // password validation
        if((strlen($password) < 5) || (strlen($password) > 15)) {
            $valid = 0;
            $valPasswordMsg = "\nPassword must be 5-15 characters";
        }
        // END of password validation

        // address validation
        if($address != ""){
            if((strlen($address) < 3) || (strlen($address) > 50)){
                $valid = 0;
                $valAddressMsg = "Comments must be 3-50 characters";
            }
        }
        // END of address validation

        // city validation
        if($city != ""){
            if((strlen($city) < 3) || (strlen($city) > 20)){
                $valid = 0;
                $valCityMsg = "Comments must be 3-20 characters";
            }
        }
        // END of city validation

        // province has no validation

        // country has no validation

        // comments validation
        if($comments != "") {
			if((strlen($comments) < 3) || (strlen($comments) > 100)) {
				$valid = 0;
				$valCommentsMsg = "Comments must be 3 to 100 characters";
			}
		}
        // END of comments validation

        // website validation
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $valid = 0;
            $valWebsiteMsg = "Please fill in proper website url";
        } 
        // END of website validation

        // gender has no validation

        // newsletter has no validation  
    } 
    // END of mysubmit

    // SUCCESS message
    if($valid == 1) {
        $successMsg = "Successfully submitted the form";
    }

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
        label[for="name"]:before,
        label[for="email"]:before,
        label[for="password"]:before,
        label[for="country"]:before,
        label[for="website"]:before {
            content: "* ";
            color: red;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <h1>PHP Form Validation</h1>

        <?php
            if($successMsg){
                echo $preSuccessMsg. $successMsg. $postMsg;
            }
        ?>

        <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Name: -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name here" value="<?php echo $name; // prepopulate the value type text input?>">
                        <?php
                            if($valNameMsg) {echo $preErrorMsg. $valNameMsg. $postMsg;} // this will appear if validation fail
                        ?>
                    </div>
                    <!-- END of Name -->

                    <!-- Email address: -->
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address here" value="<?php echo $email; ?>"> 
                        <?php
                            if($valEmailMsg){echo $preErrorMsg. $valEmailMsg. $postMsg;}
                        ?>
                    </div>
                    <!-- END of Email address -->

                    <!-- Password: -->
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password here">
                        <?php
                            if($valPasswordMsg) {echo $preErrorMsg. $valPasswordMsg. $postMsg;} // this will appear if validation fail
                        ?>
                    </div>
                    <!-- END of Password -->
                    
                    <!-- Address: -->
                    <div class="form-group">
                        <label for="address">Adress:</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address here" value="<?php echo $address; ?>"> 
                        <?php
                            if($valAddressMsg) { echo $preErrorMsg. $valAddressMsg. $postMsg; }
                        ?>
                    </div>
                    <!-- END of Address -->

                    <!-- City: -->
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter city here" value="<?php echo $city; ?>"> 
                        <?php
                            if($valCityMsg) { echo $preErrorMsg. $valCityMsg. $postMsg; }
                        ?>
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
                        <?php
                            if($valCommentsMsg) { echo $preErrorMsg. $valCommentsMsg. $postMsg; }
                        ?>
                    </div>
                    <!-- END of Comments -->
                    
                    <!-- Website URL: -->
                    <div class="form-group">
                        <label for="website">Website URL:</label>
                        <input type="text" class="form-control" name="website" placeholder="Enter url here" value="<?php echo $website; ?>">
                        <?php
                            if($valWebsiteMsg){echo $preErrorMsg. $valWebsiteMsg. $postMsg;}
                        ?>
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