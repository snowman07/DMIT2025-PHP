<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
</head>
<body>
    <!--To use file uploads, we MUST include the enctype attribute in the form tag
    enctype="multipart/form-data"
    -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <input type="file"  name="myfile">
        <input type="submit" name="mysubmit">
    </form>

    <?php

        //Lets set some vars for the folders
        $originalsFolder = "originals/";
        $thumbsFolder = "thumbs/";
        $displayFolder = "display/";



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

            //image type
            if($_FILES["myfile"]["type"] != "image/jpeg") {
                $valid = 0;
                $valMessage = "Wrong FileType: That is NOT a JPEG image.";
            }

            //image size
            if($_FILES["myfile"]["size"]/1024/1024 > 3) { //change the 8
                $valid = 0;
                $valMessage = "File too large. Please upload an image smaller than 3 MB";
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
                //if(move_uploaded_file($_FILES["myfile"]["tmp_name"], "uploadedfiles/" . $_FILES["myfile"]["name"])) { //directory is added here
                if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $originalsFolder . $_FILES["myfile"]["name"])) { //directory is added here
                    // SUCCESS: File has been uploaded. Go ahead, and create thumbnail copies
                    
                    $thisFile = $originalsFolder . $_FILES["myfile"]["name"];

                    //createThumbnail($file, $folder, $newwidth) ---> params mean (source, destination, width)
                    createThumbnail($thisFile, $thumbsFolder, 300);

                    createThumbnail($thisFile, $displayFolder, 800);
                    

                    echo "Upload Successful";
                } else {
                    echo "ERROR";
                }

            }
            // PLEASE MAKE SURE YOU CHECK FILEZILLA(and refresh the view) TO SEE IF THE FILES ARE THERE!!!!!!
        }

        if($valMessage) {
            echo "<h3>$valMessage</h3>";
        }

        // function to resize the image; make smaller copy

        function createThumbnail($file, $folder, $newwidth) {

            list($width, $height) = getimagesize($file);
            $imgRatio = $width/$height;

            $newheight= $newwidth/$imgRatio;

            //echo "$newwidth | $newheight";

            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($file);

            //resize
            // IN ORIGINALS FOLDER is the ACTUAL SIZE. IN THUMBS FOLDER is the RESIZED IMAGE 
            $newFilename = basename($file); // strip path from original filename

            // (dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
            imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            imagejpeg($thumb, $folder . $newFilename, 80);

            imagedestroy($thumb);
            imagedestroy($source);
        }
          
    ?>  
</body>
</html>