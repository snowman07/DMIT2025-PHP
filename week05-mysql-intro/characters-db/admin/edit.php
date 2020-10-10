<?php
	include("../includes/header.php");

	//$result = mysqli_query($con, "SELECT * FROM characters"); //this is only for list.php


	$first_name = trim($_POST["first-name"]);
	$last_name = trim($_POST["last-name"]);
	$age = trim($_POST["age"]);
	$occupation = trim($_POST["occupation"]);
	$description = trim($_POST["description"]);

	//echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {
		
		// VALIDATION HERE!!!

		// lets set some variables for later use
		$valid = 1;	//assume everyting is OK, go ahead and process form data
			// vars here are for bootstrap design
		$msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
		$msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
		$msgPost = "\n</div>";

		//Firstname validation
		if((strlen($first_name) < 1) || (strlen($first_name) > 20)) {
			$valid = 0;
			$valFirstNameMsg = "\nPlease enter firstname from 1 to 20 characters";
		}

		//Lastname validation
		if((strlen($last_name) < 1) || (strlen($last_name) > 20)) {
			$valid = 0;
			$valLastNameMsg = "\nPlease enter lastname from 1 to 20 characters";
		}

		//Age validation
		if(strlen($age) == "")  {
			$valid = 0;
			$valAgeMsg = "\nPlease enter your age";
		}

		//Occupdation validation
		if(strlen($occupation) == "")  {
			$valid = 0;
			$valOccupationMsg = "\nPlease enter your occupation";
		}

		//Description validation
		if($description != "") {
			if((strlen($description) < 3) || (strlen($description) > 100)) {
				$valid = 0;
				$valDescriptionMsg = "Description must be 3 to 100 characters";
			}
		}

		//SUCCESS!!! If boolean ($valid) is still 1, then user form data is good, go ahead and process this form
		if($valid == 1) {

			// mysql INSERT
			mysqli_query($con, "INSERT INTO characters(first_name, last_name, age, occupation, description) VALUES('$first_name', '$last_name', '$age', '$occupation', '$description')") or die(mysqli_error($con));

			$msgSuccess = "New character inserted.";

			// IF SUCCESS, form will be blank
			$first_name = "";
			$last_name = "";
			$age = "";
			$occupation = "";
			$description = "";
		}

	} // END of if
?>

<h2>Edit</h2>

<?php
	if($msgSuccess) {
		echo $msgPreSuccess.$msgSuccess.$msgPost;
	}
?>

<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<!--start of Firstname-->
	<div class="form-group">
		<label for="first-name">Firstname:</label>
		<input
			type="text"
			class="form-control"
			name="first-name"
			placeholder="Enter firstname here"
			value="<?php echo $first_name; // prepopulate the value type text input?>"
		>
		<?php
			if($valFirstNameMsg) { echo $msgPreError. $valFirstNameMsg. $msgPost; } // this is validation
		?>
	</div>
	<!--end of Firstname-->
	<!--start of Lastname-->
	<div class="form-group">
		<label for="last-name">Lastname:</label>
		<input
			type="text"
			class="form-control"
			name="last-name"
			placeholder="Enter lastname here"
			value="<?php echo $last_name; // prepopulate the value type text input?>"
		>
		<?php
			if($valLastNameMsg) { echo $msgPreError. $valLastNameMsg. $msgPost; } // this is validation
		?>
	</div>
	<!--end of Lastname-->
	<!--start of Age-->
	<div class="form-group">
		<label for="age">Age:</label>
		<input
			type="number"
			class="form-control"
			name="age"
			placeholder="Enter age here"
			value="<?php echo $age; // prepopulate the value type text input?>"
		>
		<?php
			if($valAgeMsg) { echo $msgPreError. $valAgeMsg. $msgPost; } // this is validation
		?>
	</div>
	<!--end of Age-->
	<!--start of Occupation-->
	<div class="form-group">
		<label for="occupation">Occupation:</label>
		<input
			type="text"
			class="form-control"
			name="occupation"
			placeholder="Enter occupation here"
			value="<?php echo $occupation; // prepopulate the value type text input?>"
		>
		<?php
			if($valOccupationMsg) { echo $msgPreError. $valOccupationMsg. $msgPost; } // this is validation
		?>
	</div>
	<!--end of Occupation-->
	<!--start of Description-->
	<div class="form-group">
		<label for="description">Description</label>
		<textarea class="form-control" name="description" rows="3"><?php if($description) {echo $description;} ?></textarea>
		<?php
			if($valDescriptionMsg) { echo $msgPreError. $valDescriptionMsg. $msgPost; }
		?>
	</div>
	<!--end of Description-->
	<div>&nbsp;</div>
	<!-- space before button -->
	<button type="submit" name="mysubmit" class="btn btn-primary mb-2">
		Submit
	</button>
	


	<!-- <div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
	</div> -->
</form>

<?php
	include("../includes/footer.php");
?>