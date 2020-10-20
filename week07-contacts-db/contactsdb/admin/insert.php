<?php
	include("../includes/header.php");

	//$result = mysqli_query($con, "SELECT * FROM characters"); //this is only for list.php

	$business_name = trim($_POST["business-name"]);
	$last_name = trim($_POST["last-name"]);
	$description = trim($_POST["description"]);

	//echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;
	


?>
<h2>Insert</h2>

<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div class="form-group">
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
	</div>

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
		<!-- <?php
			if($valFirstNameMsg) { echo $msgPreError. $valFirstNameMsg. $msgPost; } // this is validation
		?> -->
	</div>
	<!--end of Business Name-->

	<div>&nbsp;</div>
	<!-- space before button -->
	<button type="submit" name="mysubmit" class="btn btn-primary mb-2">
		Submit
	</button>


</form>

<?php
	include("../includes/footer.php");
?>