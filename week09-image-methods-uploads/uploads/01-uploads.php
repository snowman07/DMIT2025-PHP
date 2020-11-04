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

            echo "Uploaded file: " . $_FILES["myfile"]["name"] . "<br>"; // filename
            echo "Filetype: " . $_FILES["myfile"]["type"] . "<br>"; // filetype
            echo "Filesize: " . $_FILES["myfile"]["size"]/1024 . " KB<br>"; // size
            //echo "Filesize: " . $_FILES["myfile"]["size"]/1024/1024 . " MB<br>"; // size
            // Remember: The dmitstudent webserver maxes out at 2.0 MB for file uploads... unless you changed it.(Which we did early on).
            echo "Errors: " . $_FILES["myfile"]["error"] . "<br>"; // any errors in uploading
            echo "Tmp name: " . $_FILES["myfile"]["tmp_name"] . "<br>"; // tmp name


            // move_uploaded_file(source, destination) --> Moves an uploaded file to a new location
            //move_uploaded_file($_FILES["myfile"]["tmp_name"], $_FILES["myfile"]["name"]); // here, file must be uploaded in remote server

            if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $_FILES["myfile"]["name"])) {
                echo "Upload Successful";
            } else {
                echo "ERROR";
            }


        }
    
    ?>
    
</body>
</html>