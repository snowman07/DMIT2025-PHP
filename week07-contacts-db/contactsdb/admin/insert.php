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
			$valBusinessNameMsg = "\nPlease enter firstname from 1 to 20 characters";
		}
		//END of Business Name validation

		// Email address validation
		$email = filter_var($email, FILTER_SANITIZE_EMAIL); // remove unwanted chars
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$valid = 0;
			$valEmailMsg = "\nFill in a proper email address";
		}
		// END of Email address validation

		// website validation
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $valid = 0;
            $valWebsiteMsg = "Please fill in proper website url";
        } 
		// END of website validation
		
		//Phone Number validation
		if((is_numeric($phone_number) < 10) || (is_numeric($phone_number) > 10)) {
			$valid = 0;
			$valPhoneNumberMsg = "\nPhone number should be 10 digits";
		}
		//END of Phone Number validation

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

	<!--start of Business Name-->

	<?php
		if($msgSuccess) {
			echo $msgPreSuccess.$msgSuccess.$msgPost;
		}
	?>
	
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
		<label for="last-name">Name:</label>
		<input
			type="text"
			class="form-control"
			name="your-name"
			placeholder="Enter your name here"
			value="<?php echo $your_name; // prepopulate the value type text input?>"
		>
		<!-- <?php
			if($valLastNameMsg) { echo $msgPreError. $valLastNameMsg. $msgPost; } // this is validation
		?> -->
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
			type="number"
			class="form-control"
			name="phone-number"
			placeholder="Enter phone number here"
			value="<?php echo $phone_number; // prepopulate the value type text input?>"
		>
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
	</div>
	<!-- END of Province -->

	<!--start of Description-->
	<div class="form-group">
		<label for="description">Description</label>
		<textarea class="form-control" name="description" rows="3"><?php if($description) {echo $description;} ?></textarea>
		<!-- <?php
			if($valDescriptionMsg) { echo $msgPreError. $valDescriptionMsg. $msgPost; }
		?> -->
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