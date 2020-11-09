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

	$title = trim($_POST["title"]);
	$message = trim($_POST["message"]);

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {
		
		// VALIDATION HERE!!!

		// lets set some variables for later use
		$valid = 1;	//assume everyting is OK, go ahead and process form data
			// vars here are for bootstrap design
		$msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
		$msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
		$msgPost = "\n</div>";

		//Title validation
		if((strlen($title) < 1) || (strlen($title) > 100)) {
			$valid = 0;
			$valTitleMsg = "\nPlease enter title from 1 to 100 characters";
		}
		//Title validation

		//Message validation
		if($message != "") {
			if((strlen($message) < 3) || (strlen($message) > 1000)) {
				$valid = 0;
				$valMessageMsg = "Message must be 3 to 1000 characters";
			}
		}

		// if((strlen($description) < 3) || (strlen($description) > 1000)) {
		// 	$valid = 0;
		// 	$valDescriptionMsg = "Description must be 3 to 1000 characters";
		// }
		//END of Message validation

		//SUCCESS!!! If boolean ($valid) is still 1, then user form data is good, go ahead and process this form
		if($valid == 1) {

			// mysql INSERT
			mysqli_query($con, "INSERT INTO arr_blog(arr_title, arr_message) 
								VALUES('$title', '$message')") 
								or die(mysqli_error($con));

			$msgSuccess = "New blog inserted.";

			// IF SUCCESS, form will be blank
			$title = "";
			$message = "";
		}
	} // END of mysubmit
?>

<div class="jumbotron clearfix">
  <h1>Insert Blog</h1>
  <p class="lead">
    You can insert blog here.
  </p>
  <a class="btn btn-primary float-right" href="logout.php" role="button">Logout</a>
</div>


<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		
	<?php
		if($msgSuccess) {
			echo $msgPreSuccess.$msgSuccess.$msgPost;
		}
	?>
		
	<!--start of Title-->
	<div class="form-group">
		<label for="title">Title:</label>
		<input
			type="text"
			class="form-control"
			name="title"
			placeholder="Enter title name here"
			value="<?php echo $title; // prepopulate the value type text input?>"
		>
		<?php
			if($valTitleMsg) { echo $msgPreError. $valTitleMsg. $msgPost; } // this is validation
		?>
	</div>
	<!--end of Title-->

	<!--start of Message-->
	<div class="form-group">
		<label for="message">Message:</label>
		<textarea class="form-control" name="message" rows="3"><?php if($message) {echo $message;} ?></textarea>
		<?php
			if($valMessageMsg) { echo $msgPreError. $valMessageMsg. $msgPost; }
		?>

		<!--Emoticon editor-->
		<div>
			<a href="javascript:emoticon('->')"><img src="../emoticons/icon_arrow.gif"></a>
			<a href="javascript:emoticon(':D')"><img src="../emoticons/icon_biggrin.gif"></a>
			<a href="javascript:emoticon(':|')"><img src="../emoticons/icon_confused.gif"></a>
			<a href="javascript:emoticon('8)')"><img src="../emoticons/icon_cool.gif"></a>
			<a href="javascript:emoticon('=(')"><img src="../emoticons/icon_cry.gif"></a>
			<a href="javascript:emoticon(':(')"><img src="../emoticons/icon_sad.gif"></a>
			<a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif"></a>
			<a href="javascript:emoticon(';-)')"><img src="../emoticons/icon_wink.gif"></a>
		</div>
	</div>
	<!--end of Message-->

	<!-- Submit button -->
	<button type="submit" name="mysubmit" class="btn btn-primary mb-2">
		Submit
	</button>
	<!-- End of Submit button -->
</form>

<?php
	include("../includes/footer.php");
?>