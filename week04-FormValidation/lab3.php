<?php

    if(isset($_POST["mysubmit"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $address = trim($_POST["address"]);
        $city = trim($_POST["city"]);

    echo "$name, $email, $password, $address, $city";
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
        .container {
            max-width: 650px;
            padding: 50px;
        }
        h1 {
            text-align: center;
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
                        <input type="text" class="form-control" name="name" placeholder="Enter name here">
                    </div>
                    <!-- END of Name -->

                    <!-- Email address: -->
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address here"> 
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
                        <input type="text" class="form-control" name="address" placeholder="Enter address here"> 
                    </div>
                    <!-- END of Address -->

                    <!-- City: -->
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter city here"> 
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
                    <!-- END of Country -->

                    <!-- Comments -->
                    <!-- END of Comments -->
                    
                    <!-- Website URL: -->
                    <!-- END of Website URL -->

                    <!-- Gender: -->
                    <!-- END of Gender -->

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