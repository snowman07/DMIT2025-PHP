<!-- this is a secured page -->
<!-- <?php
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

?> -->

<?php
	include("../includes/header.php");

	//$result = mysqli_query($con, "SELECT * FROM characters"); //this is only for list.php

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

	//echo $business_name . " " . $email . " " . $newsletter; 
	
	
	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {


		
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
            $valPhoneNumberMsg = "Please fill in proper phone number format";
		}

		//if (strlen($phone_number) < 10 || strlen($phone_number) > 14) 
		if (strlen($phone_number) < 10 || strlen($phone_number) > 10) {
			$valid = 0;
            $valPhoneNumberMsg = "Please fill in proper phone number format";
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

			// mysql INSERT
			mysqli_query($con, "INSERT INTO arr_contacts(arr_bizname, arr_name, arr_email, arr_website, arr_phone, 
														arr_address, arr_city, arr_prov, arr_desc, arr_newsletter) 
								VALUES('$business_name', '$your_name', '$email', '$website', '$phone_number', 
														'$address', '$city', '$province', '$description', '$newsletter')") 
								or die(mysqli_error($con));

			$msgSuccess = "New contact inserted.";

			// IF SUCCESS, form will be blank
			$business_name = "";
			$your_name = "";
			$email = "";
			$website = "";
			$phone_number = "";
			$address = "";
			$city = "";
			$province = "";
			$description = "";
			$newsletter = "";
		}
	} // END of if

?>

<!--Style for required field-->
<style>
	label[for="business-name"]:before,
	label[for="email"]:before,
	label[for="website"]:before,
	label[for="phone-number"]:before{
		content: "* ";
		color: red;
	}
</style>
<!--END of Style for required field-->

<h2>Insert</h2>

<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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

<?php
	include("../includes/footer.php");
?>