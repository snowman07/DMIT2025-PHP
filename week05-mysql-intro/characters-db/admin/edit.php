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
        $tmp = mysqli_query($con, "SELECT id FROM characters LIMIT 1");
        while($row = mysqli_fetch_array($tmp)){
			$pageID = $row["id"];	// here is our default value
		}
	}
	//echo "<h1>$pageID</h1>";




	// Step 3: If user submitted the form, then do UPDATE

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {

		$first_name = trim($_POST["first-name"]);
		$last_name = trim($_POST["last-name"]);
		$age = trim($_POST["age"]);
		$occupation = trim($_POST["occupation"]);
		$description = trim($_POST["description"]);
		
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

			// THIS IS TO UPDATE THE EDIT PAGE
			// doNOT add a comma after the last item
			mysqli_query($con, "UPDATE characters SET 
				first_name = '$first_name', 
				last_name = '$last_name',
				age = '$age',
				occupation = '$occupation',
				description = '$description'	
				WHERE id = '$pageID'") or die(mysqli_error($con));
			
			$msgSuccess = "Characters has been updated.";

			// IF SUCCESS, form will be blank
			// $first_name = "";
			// $last_name = "";
			// $age = "";
			// $occupation = "";
			// $description = "";
		}
	} // END of if

	



    /*Step 1: Create dynamic nav system */

    $result = mysqli_query($con, "SELECT * FROM characters");

    // Now, we have to loop thru all records and display to the user

    while($row = mysqli_fetch_array($result)){
        $thisFname = $row['first_name'];
        $thisLname = $row['last_name'];
        $thisId = $row["id"];

        // from this data, create some links which shows the character names to the user

        $editLinks .= "\n<a href=\"edit.php?id=$thisId\">$thisFname $thisLname</a><br>";

        /* Query string syntax: pagename.php?var=value&var2=value2&var3=value3 */
    
    } // end of while

    /* Step 2: Prepop form fields with existing values for selected item */
    $result = mysqli_query($con, "SELECT * FROM characters WHERE id = '$pageID'");
	
	// Now, we have to loop thru all records and display to the user
    while($row = mysqli_fetch_array($result)){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $occupation = $row['occupation'];
        $age = $row['age'];
        $description = $row['description'];
    }
	//echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;

	
?>

<h2>Edit</h2>

<div class="row">

	<div class="col-sm-8">
		<?php
			if($msgSuccess) {
				echo $msgPreSuccess.$msgSuccess.$msgPost;
			}
		?>

		<?php
			/*
			$_SERVER['REQUEST_URI'] will retain the necessary Query String (appended URL) info
			$_SERVER['PHP_SELF'] will NOT retain the necessary Query String (appended URL) info
			*/
		?>

		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>"> <!--from PHP_SELF to REQUEST_URI-->
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


		<!--Here we will put our Delete links-->
		<!-- <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
		Submit
		</button> -->
		<button class="btn btn-danger">
			<a href="delete.php?id=<?php echo $pageID ?>">Delete Character</a>
		</button>

	</div> <!-- END OF col-sm-8-->

	<div class="col-sm-4">
		<?php
			// temp location for our character select links. Might do this in a second column later
			echo $editLinks;
		?>
	</div> <!-- END of col-sm-4 -->


</div> <!--END of row-->
<?php
	include("../includes/footer.php");
?>