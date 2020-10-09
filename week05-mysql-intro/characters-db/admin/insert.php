<?php
	include("../includes/header.php");

	$first_name = trim($_POST["first-name"]);
	$last_name = trim($_POST["last-name"]);
	$age = trim($_POST["age"]);
	$occupation = trim($_POST["occupation"]);
	$description = trim($_POST["description"]);

	//echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {
		// validation here

	}
?>

<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<!--start of Firstname-->
	<div class="form-group">
		<label for="first-name">Firstname:</label>
		<input
			type="text"
			class="form-control"
			name="first-name"
			placeholder="Enter firstname here"
		>
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
		>
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
		>
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
		>
	</div>
	<!--end of Occupation-->
	<!--start of Description-->
	<div class="form-group">
		<label for="description">Description</label>
		<textarea class="form-control" name="description" rows="3"></textarea>
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