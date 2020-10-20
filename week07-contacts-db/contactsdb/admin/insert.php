<?php
	include("../includes/header.php");

	//$result = mysqli_query($con, "SELECT * FROM characters"); //this is only for list.php

	$business_name = trim($_POST["business-name"]);
	$your_name = trim($_POST["your-name"]);
	$email = trim($_POST["email"]);
	$website = trim($_POST["website"]);

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
		<?php
			if($valLastNameMsg) { echo $msgPreError. $valLastNameMsg. $msgPost; } // this is validation
		?>
	</div>
	<!--end of Name-->

	<!-- Email address: -->
	<div class="form-group">
		<label for="email">Email address:</label>
		<input type="text" class="form-control" name="email" placeholder="Enter email address here" value="<?php echo $email; ?>"> 
		<?php
			if($valEmailMsg){echo $preErrorMsg. $valEmailMsg. $postMsg;}
		?>
	</div>
	<!-- END of Email address -->

	<!-- Website URL: -->
	<div class="form-group">
		<label for="website">Website URL:</label>
		<input type="text" class="form-control" name="website" placeholder="Enter url here" value="<?php echo $website; ?>">
		<?php
			if($valWebsiteMsg){echo $preErrorMsg. $valWebsiteMsg. $postMsg;}
		?>
	</div>
	<!-- END of Website URL -->

	<div>&nbsp;</div>
	<!-- space before button -->
	<button type="submit" name="mysubmit" class="btn btn-primary mb-2">
		Submit
	</button>


</form>

<?php
	include("../includes/footer.php");
?>