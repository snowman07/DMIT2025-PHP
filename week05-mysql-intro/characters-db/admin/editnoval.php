<?php
    include("../includes/header.php");
    
    /*
    1. Get all existing items and create dynamic nav system
    2. Prepop form fields with the selected item data
    3. If user submit the form, UPDATE the item in the DB
    */

    // Lets retrieve our "page setter" variable that will define the content, In this case, which item do we edit
    $pageID = $_GET["id"];
    //echo "<h1>$pageID</h1>";

    // but, what happens if we  just come to edit and havent yet selected an item to edit? Lets have a default item that is chosen as soon as we load the page

    if(!isset($pageID)) {
        $tmp = mysqli_query($con, "SELECT id FROM characters LIMIT 1");
        while($row = mysqli_fetch_array($tmp)){
            $pageID

    }

    /*Step 1: Create dynamic nav system */

    $result = mysqli_query($con, "SELECT * FROM characters");

    // Now, we have to loop thru all records and display to the user

    while($row = mysqli_fetch_array($result)){
        $thisFname = $row['first_name'];
        $thisLname = $row['last_name'];
        $thisId = $row["id"];

        // from this data, create some links which shows the character names to the user

        $editLinks .= "\n<a href=\"edit.php?id=thisId\">$thisFname $thisLname</a><br>";

        /* Query string syntax: pagename.php?var=value&var2=value2&var3=value3 */
    
    } // end of while

    /* Step 2: Prepop form fields with existing values for selected item */
    $result = mysqli_query($con, "SELECT * FROM characters WHERE id = '$pageID'");

    while($row = mysqli_fetch_array($result)){

        $first_name = trim($_POST["first-name"]);
        $last_name = trim($_POST["last-name"]);
        $age = trim($_POST["age"]);
        $occupation = trim($_POST["occupation"]);
        $description = trim($_POST["description"]);
    }
	//echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {
		// validation here

	}
?>

<h2>Edit</h2>

<?php
    // temp Location for our character select links. Might do this in a 2nd column later
    echo $editLinks;
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