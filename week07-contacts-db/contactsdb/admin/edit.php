<!-- this is a secured page -->
<?php
    session_start();
    //echo session_id();

    //if(!isset($_SESSION['aasdffrtgfb'])) {        //<-- from here     isset means something is set
    if(isset($_SESSION['aasdffrtgfbqw'])) {                //<-- to here
        //header("Location: login.php");
        //echo "Logged in";
    } else {
        //echo "NOT logged in";
        header("Location: login.php");
    }
?>

<?php
    include("../includes/header.php");

    /*
    1. Get all existing items and create dynamic nav system
    2. Prepop form fields with the selected item data
    3. If user submit the form, UPDATE the item in the DB
    */

    // Lets retrieve our "page setter" variable that will define the content, In this case, which item do we edit
    $pageID = $_GET['id'];
    //echo "<h1>$pageID</h1>";

    // but, what happens if we  just come to edit and havent yet selected an item to edit? Lets have a default item that is chosen as soon as we load the page

    if(!isset($pageID)) {
        $tmp = mysqli_query($con, "SELECT id FROM arr_contacts LIMIT 1");
        while($row = mysqli_fetch_array($tmp)){
			$pageID = $row["id"];	// here is our default value
		}
	}
    //echo "<h1>$pageID</h1>";

    
    // Step 3: If user submitted the form, then do UPDATE

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {

        $business_name = trim($_POST["business-name"]);
        $your_name = trim($_POST["your-name"]);
        $email = trim($_POST["email"]);
        $website = trim($_POST["website"]);
        $phone_number = trim($_POST["phone-number"]);
        $address = trim($_POST["address"]);
        $city = trim($_POST["city"]);
        $province = trim($_POST["province"]);
        $description = trim($_POST["description"]);
        $newsletter = trim($_POST["newsletter"]);
		
		// VALIDATION HERE!!!

		// lets set some variables for later use
		$valid = 1;	//assume everyting is OK, go ahead and process form data
			// vars here are for bootstrap design
		$msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
		$msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
		$msgPost = "\n</div>";

		//Business Name validation
		if((strlen($business_name) < 1) || (strlen($business_name) > 20)) {
			$valid = 0;
			$valBusinessNameMsg = "\nPlease enter business name from 1 to 20 characters";
		}
		//END of Business Name validation

		//Name validation
		if((strlen($your_name) < 3) || (strlen($your_name) > 20)) {
			$valid = 0;
			$valNameMsg = "\nPlease enter a name from 3 to 20 characters";
		}
		//END of Name validation

		// Email address validation
		$email = filter_var($email, FILTER_SANITIZE_EMAIL); // remove unwanted chars
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$valid = 0;
			$valEmailMsg = "\nFill in a proper email address";
		}
		// END of Email address validation

		// website validation	// filter_var is a PHP built-in filters validation
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $valid = 0;
            $valWebsiteMsg = "Please fill in proper website url";
        } 
		// END of website validation
		
		//Phone Number validation
		// refer to this link: https://www.digitaldesignjournal.com/how-to-validate-phone-numbers-using-php/
		
		// One way to validate phone number. This is the PHP built-in filters
		$phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT); // remove unwanted chars
		$phone_number =	str_replace("-", "", $phone_number);
		if (!filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT)) {
			$valid = 0;
            $valPhoneNumberMsg = "Please fill in 10 digit phone number";
		}

		//if (strlen($phone_number) < 10 || strlen($phone_number) > 14) 
		if (strlen($phone_number) < 10 || strlen($phone_number) > 10) {
			$valid = 0;
            $valPhoneNumberMsg = "Please fill in 10 digit phone number";
		} 


		// Other way to validate phone number is called Regular Expressions(regex)
		// if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone_number)) {
		// 	$valid = 0;
        //     $valPhoneNumberMsg = "Please fill proper phone format";
		// }

		//END of Phone Number validation

		//Province validation
		if($province == "") {
			$valid = 0;
			$valProvinceMsg = "Please select a province";
		}
		//END of Province validation

		//Description validation
		if($description != "") {
			if((strlen($description) < 3) || (strlen($description) > 100)) {
				$valid = 0;
				$valDescriptionMsg = "Description must be 3 to 100 characters";
			}
		}

		// if((strlen($description) < 3) || (strlen($description) > 1000)) {
		// 	$valid = 0;
		// 	$valDescriptionMsg = "Description must be 3 to 1000 characters";
		// }
		//END of Description validation

		//SUCCESS!!! If boolean ($valid) is still 1, then user form data is good, go ahead and process this form
		if($valid == 1) {

            // THIS IS TO UPDATE THE EDIT PAGE
            // doNOT add a comma after the last item
            //column_name = $php variable
			mysqli_query($con, "UPDATE arr_contacts SET 
                    arr_bizname = '$business_name', 
                    arr_name = '$your_name',
                    arr_email = '$email',
                    arr_website = '$website',
                    arr_phone = '$phone_number',
                    arr_address = '$address',
                    arr_city = '$city',
                    arr_prov = '$province',
                    arr_desc = '$description',
                    arr_newsletter = '$newsletter'	
                    WHERE id = '$pageID'") or die(mysqli_error($con));
        
            $msgSuccess = "Contacts has been updated.";


			// IF SUCCESS, form will be blank
			// $business_name = "";
			// $your_name = "";
			// $email = "";
			// $website = "";
			// $phone_number = "";
			// $address = "";
			// $city = "";
			// $province = "";
			// $description = "";
			// $newsletter = "";
        }
        
    } // END of if
    

    /*Step 1: Create dynamic nav system */

    $result = mysqli_query($con, "SELECT * FROM arr_contacts");

    // Now, we have to loop thru all records and display to the user

    while($row = mysqli_fetch_array($result)){
        $thisBusinessname = $row["arr_bizname"];
        $thisId = $row["id"];

        // from this data, create some links which shows the character names to the user

        $editLinks .= "\n<a href=\"edit.php?id=$thisId\">$thisBusinessname</a><br>";

        /* Query string syntax: pagename.php?var=value&var2=value2&var3=value3 */
    
    } // end of while
    

    /* Step 2: Prepop form fields with existing values for selected item */
    $result = mysqli_query($con, "SELECT * FROM arr_contacts WHERE id = '$pageID'");

    // Now, we have to loop thru all records and display to the user
    while($row = mysqli_fetch_array($result)){
        $business_name = $row['arr_bizname'];
        $your_name = $row['arr_name'];
        $email = $row['arr_email'];
        $website = $row['arr_website'];
        $phone_number = $row['arr_phone'];
        $address = $row['arr_address'];
        $city = $row['arr_city'];
        $province = $row['arr_prov'];
        $description = $row['arr_desc'];
        $newsletter = $row['arr_newsletter'];
    }
    //echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;
?>

<div class="jumbotron clearfix">
  <h1>Edit Contacts</h1>
  <p class="lead">
    You can edit contacts here.
  </p>
  <a class="btn btn-primary float-right" href="logout.php" role="button">Logout</a>
</div>

<div class="row"> 
    <div class="col-sm-8">

        <?php
			/*
			$_SERVER['REQUEST_URI'] will retain the necessary Query String (appended URL) info <-- use this for form updates
			$_SERVER['PHP_SELF'] will NOT retain the necessary Query String (appended URL) info
			*/
		?>

        <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>"> <!--from PHP_SELF to REQUEST_URI-->
            <!-- <div class="form-group">
                <label for="alpha">Alpha:</label>
                <input type="text" name="alpha" class="form-control">
            </div>
            <div class="form-group">
                <label for="beta">Beta:</label>
                <textarea name="beta" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="submit">&nbsp;</label>
                <input type="submit" name="submit" class="btn btn-info" value="Submit">
            </div> -->

            <?php
                if($msgSuccess) {
                    echo $msgPreSuccess.$msgSuccess.$msgPost;
                }
            ?>

            <!--start of Business Name-->
            <div class="form-group">
                <label for="business-name">Business Name:</label>
                <input
                    type="text"
                    class="form-control"
                    name="business-name"
                    placeholder="Enter business name here"
                    value="<?php echo $business_name; // prepopulate the value type text input?>"
                >
                <?php
                    if($valBusinessNameMsg) { echo $msgPreError. $valBusinessNameMsg. $msgPost; } // this is validation
                ?>
            </div>
            <!--end of Business Name-->

            <!--start of Name-->
            <div class="form-group">
                <label for="your-name">Name:</label>
                <input
                    type="text"
                    class="form-control"
                    name="your-name"
                    placeholder="Enter your name here"
                    value="<?php echo $your_name; // prepopulate the value type text input?>"
                >
                <?php
                    if($valNameMsg) { echo $msgPreError. $valNameMsg. $msgPost; } // this is validation
                ?>
            </div>
            <!--end of Name-->

            <!-- Email address: -->
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email address here" value="<?php echo $email; ?>"> 
                <?php
                    if($valEmailMsg){echo $msgPreError. $valEmailMsg. $msgPost;}
                ?>
            </div>
            <!-- END of Email address -->

            <!-- Website URL: -->
            <div class="form-group">
                <label for="website">Website URL:</label>
                <input type="text" class="form-control" name="website" placeholder="Enter url here" value="<?php echo $website; ?>">
                <?php
                    if($valWebsiteMsg){echo $msgPreError. $valWebsiteMsg. $msgPost;}
                ?>
            </div>
            <!-- END of Website URL -->

            <!--start of Phone Number-->
            <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input
                    type="tel"
                    class="form-control"
                    name="phone-number"
                    placeholder="Enter phone number here"
                    value="<?php echo $phone_number; // prepopulate the value type text input?>"
                > <!--
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" // html tel validation
                -->
                <?php
                    if($valPhoneNumberMsg) { echo $msgPreError. $valPhoneNumberMsg. $msgPost; }
                ?>
            </div>
            <!--end of Phone Number-->

            <!-- Address: -->
            <div class="form-group">
                <label for="address">Adress:</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address here" value="<?php echo $address; ?>"> 
                <!-- <?php
                    if($valAddressMsg) { echo $preErrorMsg. $valAddressMsg. $postMsg; }
                ?> -->
            </div>
            <!-- END of Address -->

            <!-- City: -->
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" placeholder="Enter city here" value="<?php echo $city; ?>"> 
                <!-- <?php
                    if($valCityMsg) { echo $preErrorMsg. $valCityMsg. $postMsg; }
                ?> -->
            </div>
            <!-- END of City -->

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
                <?php
                    if($valProvinceMsg) { echo $msgPreError. $valProvinceMsg. $msgPost; }
                ?>
            </div>
            <!-- END of Province -->

            <!--start of Description-->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"><?php if($description) {echo $description;} ?></textarea>
                <?php
                    if($valDescriptionMsg) { echo $msgPreError. $valDescriptionMsg. $msgPost; }
                ?>
            </div>
            <!--end of Subscribe to Newsletter-->

            <!---->
            <div class="form-check">
                <label for="newsletter" class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="newsletter" value="1" <?php if(isset($newsletter) && $newsletter == 1){echo "checked";} ?>>Subscribe to Newsletter
                </label>
            </div>
            <!--END of Subscribe to Newsletter-->

            <div>&nbsp;</div> <!-- space before button -->

            <!-- Submit button -->
            <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
                Submit
            </button>
            <!-- End of Submit button -->

        </form>

        <!--Here we will put our Delete links-->
		<!-- <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
		Submit
		</button> -->
		<button class="btn btn-danger">
			<a href="delete.php?id=<?php echo $pageID ?>" onclick="return confirm('Are you sure?')">Delete Character</a>
			<!--onClick is an "inline JS confrim"-->
		</button>

    </div> <!-- END OF col-sm-8-->

    <div class="col-sm-4">
		<div class="alert alert-info">
			<p><b>Lists of all the contacts:</b></p>
			<?php
				// temp location for our character select links. Might do this in a second column later
				echo $editLinks;
			?>
		</div>
	</div> <!-- END of col-sm-4 -->


</div> <!--END of class="row"-->

<?php
	include("../includes/footer.php");
?>

