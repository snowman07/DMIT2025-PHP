<!--THIS CODE IS SIMILAR TO >>week09 >>04--uploadvalidationcreatethumb-add2db.php -->
<!-- this is a secured page -->
<!-- <?php
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
?> -->

<?php
    include("../includes/header.php");

    //Lets set some vars for the folders
    $originalsFolder = "../uploads/originals/"; ////////// PATH MODIFICATION
    $thumbsFolder = "../uploads/thumbs/"; ////////// PATH MODIFICATION
    $displayFolder = "../uploads/display/"; ////////// PATH MODIFICATION

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $filename = $_FILES["myfile"]["name"];
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));//Enable PNG uploads as well as JPG

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

        // VALIDATION
        $valid = 1; // assumes validation has passed. Any validator can override this and set to 0
            // vars here for bootstrap design
        $msgPreError = "\n<div class=\"alert alert-danger\" role=\"alert\">";
        $msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
        $msgPost = "\n</div>";

        //Enable PNG uploads as well as JPG
        $allowed_extensions = array("image/png", "image/jpeg");

        //Title validation
		if((strlen($title) < 1) || (strlen($title) > 100)) {
			$valid = 0;
			$valTitleMsg = "\nPlease enter title from 1 to 100 characters";
		}
        //end of Title validation
        
        //Description validation
        if($description != "") {
			if((strlen($description) < 3) || (strlen($description) > 1000)) {
				$valid = 0;
				$valDescriptionMsg = "Message must be 3 to 1000 characters";
			}
		}
        //end of Description validation

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
                    mysqli_query($con, "INSERT INTO arr_lab7_image_gallery(arr_title, arr_description, arr_filename) 
                                        VALUES('$title', '$description', '$filename')") 
                                        or die(mysqli_error($con));

                    $msgSuccess = "Upload successful.";
                    //echo "Upload Successful";
                } else if ($imageFileType == "png") {
                    createThumbnailPNG($thisFile, $thumbsFolder, 300, $orientation);
                    createThumbnailPNG($thisFile, $displayFolder, 800, $orientation);

                    // mysql INSERT
                    mysqli_query($con, "INSERT INTO arr_lab7_image_gallery(arr_title, arr_description, arr_filename) 
                                        VALUES('$title', '$description', '$filename')") 
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
  <h1>Insert Image</h1>
  <p class="lead">
    You can insert image here.
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

    <!--start of Title-->
    <div class="form-group">
        <label for="title">Title</label>
        <input 
            type="text"
            class="form-control"
            name="title"
            placeholder="Enter title here"
			value="<?php echo $title; // prepopulate the value type text input?>"
        >
        <?php
			if($valTitleMsg) { echo $msgPreError. $valTitleMsg. $msgPost; } // this is validation
		?>
    </div>
    <!--end of Title-->

    <!--start of Description-->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="10"><?php if($description) {echo $description;} ?></textarea>
        <?php
            if($valDescriptionMsg) { echo $msgPreError. $valDescriptionMsg. $msgPost; }
        ?>
    </div>
    <!--end of Description-->

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

    <!--Submit button-->
    <button type="submit" name="mysubmit" class="btn btn-primary mb-2">
        Submit
    </button>
    <!--end of Submit button-->
</form>

<?php
    include("../includes/footer.php");
?>