<!--THIS CODE IS SIMILAR TO >>week09 >>04--uploadvalidationcreatethumb-add2db.php -->
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

    //Lets set some vars for the folders
    $originalsFolder = "../uploads/originals/"; ////////// PATH MODIFICATION
    $thumbsFolder = "../uploads/thumbs/"; ////////// PATH MODIFICATION
    $displayFolder = "../uploads/display/"; ////////// PATH MODIFICATION

    $plant_name = trim($_POST["plant-name"]);
    $plant_description = trim($_POST["plant-description"]);
    $filename = $_FILES["myfile"]["name"];
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));//Enable PNG uploads as well as JPG

    $plant_price = trim($_POST["plant-price"]);
    $plant_size = trim($_POST["plant-size"]);
    $plant_type = trim($_POST["plant-type"]);
    $plant_indoor = trim($_POST["plant-indoor"]);
    $plant_inventory = trim($_POST["plant-inventory"]);
    $plant_allseason = trim($_POST["plant-allseason"]);
    $plant_bestseller = trim($_POST["plant-bestseller"]);

    if(isset($_POST["mysubmit"])) {
        /* Lets take a look at the $_FILES array. All the info about this file is in that  

        echo "<pre>";
        print_r($_FILES["myfile"]);
        echo "</pre>";
        */

        // echo "Uploaded file: " . $_FILES["myfile"]["name"] . "<br>"; // filename
        // echo "Filetype: " . $_FILES["myfile"]["type"] . "<br>"; // filetype
        // echo "Filesize: " . $_FILES["myfile"]["size"]/1024 . " KB<br>"; // size
        // //echo "Filesize: " . $_FILES["myfile"]["size"]/1024/1024 . " MB<br>"; // size
        // // Remember: The dmitstudent webserver maxes out at 2.0 MB for file uploads... unless you changed it.(Which we did early on).
        // echo "Errors: " . $_FILES["myfile"]["error"] . "<br>"; // any errors in uploading
        // echo "Tmp name: " . $_FILES["myfile"]["tmp_name"] . "<br>"; // tmp name

        //------------- VALIDATION-------------------//
        $valid = 1; // assumes validation has passed. Any validator can override this and set to 0
            // vars here for bootstrap design
        $msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
        $msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
        $msgPost = "\n</div>";

        //Enable PNG uploads as well as JPG
        $allowed_extensions = array("image/png", "image/jpeg");

        //Plant Name validation
		if((strlen($plant_name) < 1) || (strlen($plant_name) > 100)) {
			$valid = 0;
			$valPlantNameMsg = "\nPlease enter plant name from 1 to 100 characters";
		}
        //end of Plant Name validation
        
        //Plant Description validation
        if($plant_description != "") {
			if((strlen($plant_description) < 3) || (strlen($plant_description) > 1000)) {
				$valid = 0;
				$valPlantDescriptionMsg = "Description must be 3 to 1000 characters";
			}
		}
        //end of Plant Description validation

        //PNG and JPEG uploads VALIDATION
        if ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
            $valid = 0;
            $validMessage = "Wrong FileType: Only JPEG, JPG and PNG allowed";
        }

        //END of PNG and JPEG uploads VALIDATION

        // //image type
        // if($_FILES["myfile"]["type"] != "image/jpeg") {
        //     $valid = 0;
        //     $valMessage = "Wrong FileType: That is NOT a JPEG image.";
        // }

        //image size
        if($_FILES["myfile"]["size"]/1024/1024 > 8) { //change the 8
            $valid = 0;
            $valMessage = "File too large. Please upload an image smaller than 8 MB";
        }

        //image blank
        if($filename == "") {
            $valid = 0;
            $valMessage = "You've not chosen a file.";
        }
        

        //Plant Price Validation
        if($plant_price == "") {
            $valid = 0;
			$valPlantPriceMsg = "\nPlease enter price";
        }
        //END of Plant Price Validation

        //Plant Size Validation
        if($plant_size == "") {
			$valid = 0;
			$valPlantSizeMsg = "Please select a plant size";
		}
        //END of Plant Size Validation

        //Plant Type Validation
        if($plant_type == "") {
			$valid = 0;
			$valPlantTypeMsg = "Please select a plant type";
		}
        //END of Plant Type Validation

        //Plant Indoor Validation
        if($plant_indoor == "") {
            $valid = 0;
            $valPlantIndoorMsg = "Please select Yes or No.";
        }
        //END of Plant Indoor Validation

        //Plant Inventory Validation
        if($plant_inventory == "") {
            $valid = 0;
            $valPlantInventoryMsg = "Please select In Stock or Out of Stock.";
        }
        //END of Plant Inventory Validation

        //Plant All Season Validation
        if($plant_allseason == "") {
            $valid = 0;
            $valPlantAllSeasonMsg = "Please select Yes or No.";
        }
        //END of Plant All Season Validation

        //Plant Best Seller Validation
        if($plant_bestseller == "") {
            $valid = 0;
            $valPlantBestSellerMsg = "Please select Yes or No.";
        }
        //END of Plant Best Seller Validation


        // // move_uploaded_file(source, destination) --> Moves an uploaded file to a new location
        // // move_uploaded_file($_FILES["myfile"]["tmp_name"], $_FILES["myfile"]["name"]);

        // if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $_FILES["myfile"]["name"]);) {
        //     echo "Upload Successful";
        // } else {
        //     echo "ERROR";
        // }

        // IF VALIDATION HAS PASSED, THEN DO THE UPLOAD
        if($valid == 1) {
            
            $temp = explode(".", $_FILES["file"]["name"]);
		    $renameFile = uniqid() . '.' . end($temp);

            //if(move_uploaded_file($_FILES["myfile"]["tmp_name"], "uploadedfiles/" . $_FILES["myfile"]["name"])) { //directory is added here
            if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $originalsFolder . $_FILES["myfile"]["name"])) { //directory is added here
                // SUCCESS: File has been uploaded. Go ahead, and create thumbnail copies
                
                $thisFile = $originalsFolder . $_FILES["myfile"]["name"];

                /*-------------------
                I NEED TO SET THIS SOMEWHERE TO FIX THE ORIENTATION OF MY IMAGES FROM PHONE

                Arr: THis is where I set this: $orientation = $exif['Orientation'];

                $exif = @exif_read_data ( $thisFile ,'IFD0');
                if ($exif !== false){
                $orientation = $exif['Orientation'];
                }else{
                $orientation = 0;
}
                ----------------*/


                if ($imageFileType == "jpg" || $imageFileType == "jpeg"){
                    //createThumbnailJPEG($file, $folder, $newwidth) ---> params mean (source, destination, width)
                    createThumbnailJPEG($thisFile, $thumbsFolder, 300, $orientation);
                    createThumbnailJPEG($thisFile, $displayFolder, 800, $orientation);
                    /* Challenge: Lets put this into the DB table
                    Title: VARCHAR ; $_POST["title"];
                    Filename: (just the name, not the path): VARCHAR ; $_FILES["myfile"]["name"];
                    */

                    //include("../includes/mysql_connect.php"); ////////// PATH MODIFICATION

                    // $title = $_POST["title"];
                    // $description = $_POST["description"];
                    // $filename = $_FILES["myfile"]["name"];

                    // mysql INSERT
                    mysqli_query($con, "INSERT INTO plant_catalog(plant_name, plant_description, plant_price, plant_image, plant_size, plant_type, plant_indoor, plant_inventory, plant_allseason, plant_bestseller) 
                                        VALUES('$plant_name', '$plant_description', '$plant_price', '$filename', '$plant_size', '$plant_type', '$plant_indoor', '$plant_inventory', '$plant_allseason', '$plant_bestseller')") 
                                        or die(mysqli_error($con));

                    $msgSuccess = "Upload successful.";
                    //echo "Upload Successful";
                } else if ($imageFileType == "png") {
                    createThumbnailPNG($thisFile, $thumbsFolder, 300, $orientation);
                    createThumbnailPNG($thisFile, $displayFolder, 800, $orientation);

                    // mysql INSERT
                    mysqli_query($con, "INSERT INTO plant_catalog(plant_name, plant_description, plant_price, plant_image, plant_size, plant_type, plant_indoor, plant_inventory, plant_allseason, plant_bestseller) 
                                        VALUES('$plant_name', '$plant_description', '$plant_price', '$filename', '$plant_size', '$plant_type', '$plant_indoor', '$plant_inventory', '$plant_allseason', '$plant_bestseller')") 
                                        or die(mysqli_error($con));

                    $msgSuccess = "Upload successful.";
                    //echo "Upload Successful";
                }
                
            } else {
                echo "ERROR";
            }

        }
        // PLEASE MAKE SURE YOU CHECK FILEZILLA(and refresh the view) TO SEE IF THE FILES ARE THERE!!!!!!
    }

    
    // function to resize the image; make smaller copy

    function createThumbnailJPEG($file, $folder, $newwidth, $orientation) {

        list($width, $height) = getimagesize($file);

        $imgRatio = $width/$height;

        $newheight= $newwidth/$imgRatio;

        //echo "$newwidth | $newheight";

        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($file);

        // (dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        //resize
        // IN ORIGINALS FOLDER is the ACTUAL SIZE. IN THUMBS FOLDER is the RESIZED IMAGE 
        $newFilename = basename($file); // strip path from original filename

        // for images from phone
        switch($orientation) {
            case 8:
                $thumb = imagerotate($thumb, 90, 0);
                break;
            case 3:
                $thumb = imagerotate($thumb, 180, 0);
                break;
            case 6: 
                $thumb = imagerotate($thumb, -90, 0);
                break;
        }

        imagejpeg($thumb, $folder . $newFilename, 80);
        imagedestroy($thumb);
        imagedestroy($source);
    }   
    
    function createThumbnailPNG($file, $folder, $newwidth, $orientation) {

        list($width, $height) = getimagesize($file);

        $imgRatio = $width/$height;

        $newheight= $newwidth/$imgRatio;

        //echo "$newwidth | $newheight";

        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefrompng($file);

        // (dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        //resize
        // IN ORIGINALS FOLDER is the ACTUAL SIZE. IN THUMBS FOLDER is the RESIZED IMAGE 
        $newFilename = basename($file); // strip path from original filename
        
        // for images from phone
        switch($orientation) {
            case 8:
                $thumb = imagerotate($thumb, 90, 0);
                break;
            case 3:
                $thumb = imagerotate($thumb, 180, 0);
                break;
            case 6: 
                $thumb = imagerotate($thumb, -90, 0);
                break;
        }
        imagepng($thumb, $folder . $newFilename, 2);
        imagedestroy($thumb);
        imagedestroy($source);
    } 

?>  

<div class="jumbotron clearfix">
  <h1>Insert Plants</h1>
  <p class="lead">
    You can insert plants here.
  </p>
  <a class="btn btn-primary float-right" href="logout.php" role="button">Logout</a>
</div>

<!--To use file uploads, we MUST include the enctype attribute in the form tag
enctype="multipart/form-data"
-->
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data"> 
    
    <?php
        if($msgSuccess) {
            echo $msgPreSuccess.$msgSuccess.$msgPost;
        }
    ?>

    <!-- Title: <input type="text" name="title"><br>
    Description: <input type="text" name="description"> -->

    <!--start of Plant Name-->
    <div class="form-group">
        <label for="plant-name">Plant Name</label>
        <input 
            type="text"
            class="form-control"
            name="plant-name"
            placeholder="Enter plant name here"
			value="<?php echo $plant_name; // prepopulate the value type text input?>"
        >
        <?php
			if($valPlantNameMsg) { echo $msgPreError. $valPlantNameMsg. $msgPost; } // this is validation
		?>
    </div>
    <!--end of Plant Name-->

    <!--start of Plant Description-->
    <div class="form-group">
        <label for="plant-description">Plant Description</label>
        <textarea class="form-control" name="plant-description" rows="10"><?php if($plant_description) {echo $plant_description;} ?></textarea>
        <?php
            if($valPlantDescriptionMsg) { echo $msgPreError. $valPlantDescriptionMsg. $msgPost; }
        ?>
    </div>
    <!--end of Plant Description-->

    <!--start of File-->
    <div class="form-group">
        <input 
            type="file"  
            name="myfile"
        ><br>
        <?php
            if($valMessage) { echo $msgPreError. $valMessage. $msgPost; } // this is validation
        ?>
    </div>
    <!--end of File-->

    <!--Plant Price-->
    <div class="form-group">
        <label for="plant-price">Plant Price</label>
        <input 
            type="number"
            class="form-control"
            name="plant-price"
            placeholder="Enter plant price here"
			value="<?php echo $plant_price; // prepopulate the value type text input?>"
        >
        <?php
			if($valPlantPriceMsg) { echo $msgPreError. $valPlantPriceMsg. $msgPost; } // this is validation
		?>
    </div>
    <!--Plant Price-->

    <!--Plant Size-->
    <div class="form-group">
        <label for="plant-size">Plant Size</label>
        <select class="form-control" name="plant-size">
            <option value="">---Select size---</option>
            <!--this serve as the placeholder-->
            <option value="small" <?php if(isset($plant_size) && $plant_size == "small") {echo "selected";} ?>>Small</option>
            <option value="medium" <?php if(isset($plant_size) && $plant_size == "medium") {echo "selected";} ?>>Medium</option>
            <option value="large" <?php if(isset($plant_size) && $plant_size == "large") {echo "selected";} ?>>Large</option>
            <!-- if(isset($province) && $province == "AB") {echo "selected";}  to prepop select options -->
        </select>
        <?php
            if($valPlantSizeMsg) { echo $msgPreError. $valPlantSizeMsg. $msgPost; }
        ?>
    </div>
    <!--END OF Plant Size-->

    <!--Plant Type-->
    <div class="form-group">
        <label for="plant-type">Plant Type</label>
        <select class="form-control" name="plant-type">
            <option value="">---Select plant type---</option>
            <!--this serve as the placeholder-->
            <option value="common" <?php if(isset($plant_type) && $plant_type == "common") {echo "selected";} ?>>Common</option>
            <option value="flowering" <?php if(isset($plant_type) && $plant_type == "flowering") {echo "selected";} ?>>Flowering</option>
            <option value="lowlight" <?php if(isset($plant_type) && $plant_type == "lowlight") {echo "selected";} ?>>Lowlight</option>
            <option value="cactus" <?php if(isset($plant_type) && $plant_type == "cactus") {echo "selected";} ?>>Cactus</option>
            <!-- if(isset($province) && $province == "AB") {echo "selected";}  to prepop select options -->
        </select>
        <?php
            if($valPlantTypeMsg) { echo $msgPreError. $valPlantTypeMsg. $msgPost; }
        ?>
    </div>
    <!--END OF Plant Type-->

    <!--Plant Indoor-->
    <div class="form-group">
        <label for="plant-indoor">Plant Indoor</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-indoor" value="yes" <?php if(isset($plant_indoor) && $plant_indoor == "yes"){echo "checked";} ?>>Yes
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-indoor" value="no" <?php if(isset($plant_indoor) && $plant_indoor == "no"){ echo "checked";} ?>>No
            </label>
        </div>
        <?php
            if($valPlantIndoorMsg) { echo $msgPreError. $valPlantIndoorMsg. $msgPost; }
        ?>
    </div>
    <!--END of Plant Indoor-->

    <!--Plant Inventory-->
    <div class="form-group">
        <label for="plant-inventory">Plant Inventory</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-inventory" value="in-stock" <?php if(isset($plant_inventory) && $plant_inventory== "in-stock"){echo "checked";} ?>>In Stock
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-inventory" value="out-of-stock" <?php if(isset($plant_inventory) && $plant_inventory == "out-of-stock"){ echo "checked";} ?>>Out of Stock
            </label>
        </div>
        <?php
            if($valPlantInventoryMsg) { echo $msgPreError. $valPlantInventoryMsg. $msgPost; }
        ?>
    </div>
    <!--END of Plant Inventory-->

    <!--Plant All Season-->
    <div class="form-group">
        <label for="plant-allseason">Plant All Season</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-allseason" value="yes" <?php if(isset($plant_allseason) && $plant_allseason == "yes"){echo "checked";} ?>>Yes
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-allseason" value="no" <?php if(isset($plant_allseason) && $plant_allseason == "no"){ echo "checked";} ?>>No
            </label>
        </div>
        <?php
            if($valPlantAllSeasonMsg) { echo $msgPreError. $valPlantAllSeasonMsg. $msgPost; }
        ?>
    </div>
    <!--END of Plant All Season-->

    <!--Plant Best Seller-->
    <div class="form-group">
        <label for="plant-bestseller">Plant Best Seller</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-bestseller" value="yes" <?php if(isset($plant_bestseller) && $plant_bestseller == "yes"){echo "checked";} ?>>Yes
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="plant-bestseller" value="no" <?php if(isset($plant_bestseller) && $plant_bestseller == "no"){ echo "checked";} ?>>No
            </label>
        </div>
        <?php
            if($valPlantBestSellerMsg) { echo $msgPreError. $valPlantBestSellerMsg. $msgPost; }
        ?>
    </div>
    <!--END of Plant Best Seller-->




    <!--Submit button-->
    <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
        Submit
    </button>
    <!--end of Submit button-->
</form>

<?php
    include("../includes/footer.php");
?>