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
        $tmp = mysqli_query($con, "SELECT id FROM arr_blog LIMIT 0 "); //from LIMIT 1
        while($row = mysqli_fetch_array($tmp)){
			$pageID = $row["id"];	// here is our default value
		}
	}
    //echo "<h1>$pageID</h1>";

    
    // Step 3: If user submitted the form, then do UPDATE

	// if statement if the button has been pressed. Test that too!
	if(isset($_POST["mysubmit"])) {

        $title = trim($_POST["title"]);
        $message = trim($_POST["message"]);
 
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
		//END of Title validation
    

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
		//END of Description validation

		//SUCCESS!!! If boolean ($valid) is still 1, then user form data is good, go ahead and process this form
		if($valid == 1) {

            // THIS IS TO UPDATE THE EDIT PAGE
            // doNOT add a comma after the last item
            //column_name = $php variable
			mysqli_query($con, "UPDATE arr_blog SET 
                    arr_title = '$title', 
                    arr_message = '$message'
                    WHERE id = '$pageID'") or die(mysqli_error($con));
        
            $msgSuccess = "Blog has been updated.";

			// IF SUCCESS, form will be blank
			// $title = "";
			// $message = "";
        }
        
    } // END of if
    
    // //==========================================
    // /*Step 1: Create dynamic nav system */

    // $result = mysqli_query($con, "SELECT * FROM arr_blog");

    // // Now, we have to loop thru all records and display to the user

    // while($row = mysqli_fetch_array($result)){
    //     $thisTitle = $row["arr_title"];
    //     $thisId = $row["id"];

    //     // from this data, create some links which shows the character names to the user

    //     $editLinks .= "\n<a href=\"edit.php?id=$thisId\">$thisTitle</a><br>";

    //     /* Query string syntax: pagename.php?var=value&var2=value2&var3=value3 */
    
    // } // end of while
    // //==========================================
    

    /* Step 2: Prepop form fields with existing values for selected item */
    $result = mysqli_query($con, "SELECT * FROM arr_blog WHERE id = '$pageID'");

    // Now, we have to loop thru all records and display to the user
    while($row = mysqli_fetch_array($result)){
        $title = $row['arr_title'];
        $message = $row['arr_message'];
    }
    //echo $first_name . " " . $last_name . " " . $age . " " . $occupation . " " . $description;
?>

<div class="jumbotron clearfix">
  <h1>Edit Blogs</h1>
  <p class="lead">
    You can edit blogs here.
  </p>
  <a class="btn btn-primary float-right" href="logout.php" role="button">Logout</a>
</div>

<div class="row"> 

    <div class="col-sm-5">
		<div class="alert alert-info">
            <p><b>Select your blogs:</b></p>
            <select name="entryselect" id="entryselect" class="form-control" onchange="go()"> <!-- id="entryselect"-->
                <option value="">---Select here---</option> <!--selected="selected"-->
                <?php  
                    $result = mysqli_query($con, "SELECT * FROM arr_blog ORDER BY id");// added ORDER BY id to sort option select in ASC
                    while($row = mysqli_fetch_array($result)){
                        $thisTitle = $row["arr_title"];
                        $thisId = $row["id"];
                        // //from this data, show the option of titles to user
                        // $titleQueryString = "edit.php?id=$thisId";
                        
                        // //echo "<option value=\"$titleOptionLink\">$thisTitle</option>";
                        // echo "\n<option value=\"$titleQueryString\">$thisTitle</option>";
                       echo "\n<option value=\"edit.php?id={$thisId}\" <?php if(($thisTitle) && ($thisTitle == $thisId)) {echo \"selected\";} ?> $thisTitle</option>";
                    }
                ?>        
            </select>            
		</div>
	</div> <!-- END of col-sm-4 -->

    <div class="col-sm-7">
        <div class="alert alert-info">
            <?php
                /*
                $_SERVER['REQUEST_URI'] will retain the necessary Query String (appended URL) info <-- use this for form updates
                $_SERVER['PHP_SELF'] will NOT retain the necessary Query String (appended URL) info
                */
            ?>

            <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>"> <!--from PHP_SELF to REQUEST_URI-->
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

                <!--start of Title-->
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input
                        type="text"
                        class="form-control"
                        name="title"
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

            <!--Here we will put our Delete links-->
            <!-- <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
            Submit
            </button> -->
            <button class="btn btn-danger">
                <a href="delete.php?id=<?php echo $pageID ?>" onclick="return confirm('Are you sure?')">Delete Character</a>
                <!--onClick is an "inline JS confrim"-->
            </button>
        </div>
    </div> <!-- END OF col-sm-8-->

    <!--There's an echo $editLinks; here!!-->



</div> <!--END of class="row"-->

<?php
	include("../includes/footer.php");
?>

