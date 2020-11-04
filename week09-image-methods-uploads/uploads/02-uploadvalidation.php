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
                if(move_uploaded_file($_FILES["myfile"]["tmp_name"], "uploadedfiles/" . $_FILES["myfile"]["name"])) { //directory is added here
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
          
    ?>  
</body>
</html>