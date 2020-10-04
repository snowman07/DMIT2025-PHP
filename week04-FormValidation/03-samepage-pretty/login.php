<?php 

	if(isset($_POST['mysubmit'])){

		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$province = trim($_POST['province']);
		$gender = trim($_POST['gender']);
		$newsletter = trim($_POST['newsletter']);
		$comments = trim($_POST['comments']);

		//echo "$username, $email, $province, $gender, $newsletter, $comments";

		// lets set some variables for later use
		$valid = 1;
			// vars here are for bootstrap design
		$msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
		$msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
		$msgPost = "\n</div>";

		// username validation
		if((strlen($username) < 3) || (strlen($username) > 20)) {
			$valid = 0;
			$valUserMsg = "\nPlease enter a Name from 3 to 20 characters";
		}
		//echo $valUserMsg;

		// email validation
		// lets cleanse email first; remove any mail injections
		$email = filter_var($email, FILTER_SANITIZE_EMAIL); // remove unwanted chars
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $valid = 0;
            $valEmailMsg = "\nPlease fill in a proper email address";
		}
		
		//province validation
		if($province == "") {
			$valid = 0;
			$valProvinceMsg = "Please select a province";
		}

		//gender validation
		if($gender == "") {
			$valid = 0;
			$valGenderMsg = "Please select a gender";
		}

		if($comments != "") {
			if((strlen($comments) < 3) || (strlen($comments) > 200)) {
				$valid = 0;
				$valCommentsMsg = "PLease enter comments from 3 to 200 characters";
			}
		}


		/*SUCCESS */
		if($valid == 1) {
			$msgSuccess = "SUCCESS. Form data is correct.";
			//here is where you would actually enter this data into a DB... or whatever this form is meant to do
		}

	}
	// end of if


?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Validation</title>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		.container{ /* optional: in case you don't like the really wide form */
			max-width: 650px;
		}

	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<div class="container">
		<h1>PHP Form Validation</h1>

		<?php
			if($msgSuccess) { 
				echo $msgPreSuccess. $msgSuccess. $msgPost;
			}
		?>
		
		<!--start of form-->
		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			
			<!--start of Name-->
			<div class="form-group">
				<label for="username">Name:</label>
				<input type="text" class="form-control" name="username" placeholder="Enter name here" value="<?php echo $username; // prepopulate the value type text input?>">  
				<?php
					if($valUserMsg) { echo $msgPreError. $valUserMsg. $msgPost; } // this is validation
				?>
			</div>
			<!--end of Name-->
			<br>
			<!--start of Email-->
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" placeholder="Enter email here" value="<?php echo $email; ?>"> 	
				<?php
					if($valEmailMsg) { echo $msgPreError. $valEmailMsg. $msgPost; }
				?>
			</div>
			<!--end of Email-->
			<br>
			<!--start of Province-->
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
			<!--end of Province-->
			<br>
			<!--start of Gender-->
			<div class="form-group">
				<label for="gender">Gender</label>
				<div class="form-check">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="gender" value="male" <?php if(isset($gender) && $gender == "male"){echo "checked";} ?>>Male
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="gender" value="female" <?php if(isset($gender) && $gender == "female"){ echo "checked";} ?>>Female
					</label>
				</div>
				<?php
					if($valGenderMsg) { echo $msgPreError. $valGenderMsg. $msgPost; }
				?>
			</div>
			<!--end of Gender-->
			<br>
			<!--start of Subscribe-->
			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="newsletter" value="1" <?php if(isset($newsletter) && $newsletter == 1){echo "checked";} ?> >Subscribe to Newsletter
				</label>
			</div>
			<!--end of Subscribe-->
			<br>
			<!--start of Comments-->
			<div class="form-group">
				<label for="comments">Comments:</label>
				<textarea name="comments" class="form-control" rows="4"><?php if($comments){echo $comments;}?></textarea>  
				<?php
					if($valCommentsMsg) { echo $msgPreError. $valCommentsMsg. $msgPost; }
				?>
			</div>
			<!--end of Comments-->
			<br><br>
			<input type="submit" class="btn btn-primary" name="mysubmit">

		</form>
		<!--end of form-->
	</div><!-- / .container -->

</body>
</html>