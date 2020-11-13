<?php
  include ("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">This is a web application based on the topic of <i>Image Methods and Uploads</i>  <br>
    <ol class="lead">
      <p><b>PHP Image Methods</b></p>
      <li>Create the image object</li>
      <li>Image processing</li>
      <li>Define header info if outputting to browser</li>
      <li>Output image to either the browser or a file</li>
      <li>Destroy the image object</li>
    </ol>
  </p>
  <ul class="lead">
      <p><b>PHP Uploads</b></p>
      <li>Necessary form attribute: enctype="multipart/form-data"</li>
      <li>$_FILES array elements</li>
      <ul> 
        <li>type</li>
        <li>name</li>
        <li>size</li>
        <li>tmp_name</li>
        <li>error</li>
      </ul>
      <li>move_uploaded_file method</li>
      <li>Upload with validation</li>
      <li>Resizing uploaded image to create thumbnail images</li>
      <li>Adding uploaded image information to database</li>
    </ul>
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>

<!--This is for the Thumbnail View-->
<?php
  $result = mysqli_query($con, "SELECT * FROM arr_lab7_image_gallery");
?>
<?php while($row = mysqli_fetch_array($result)): ?> <!-- ternary operator with a colon ":" -->
  <div style="width:300px; float:left; margin:10px">
  <!--<div style="display:flex; flex-flow:column wrap; justify-content:space-between;">-->
    <a href="display.php?id=<?php echo $row['id'] ?> ">
      <img src="uploads/thumbs/<?php echo $row["arr_filename"]; ?>" >   <!--need to modify the src-->
    </a>
    <?php
      echo "<center>" .$row["arr_title"] ."</center>";
    ?>
  </div>
<?php endwhile; ?>
<!--END OF This is for the Thumbnail View-->




<?php
  $filename = $row["arr_filename"];

  function correctImageOrientation($filename) {
    if (function_exists('exif_read_data')) {
      $exif = exif_read_data($filename);
      if($exif && isset($exif['Orientation'])) {
        $orientation = $exif['Orientation'];
        if($orientation != 1){
          $img = imagecreatefromjpeg($filename);
          $deg = 0;
          switch ($orientation) {
            case 3:
              $deg = 180;
              break;
            case 6:
              $deg = 270;
              break;
            case 8:
              $deg = 90;
              break;
          }
          if ($deg) {
            $img = imagerotate($img, $deg, 0);        
          }
          // then rewrite the rotated image back to the disk as $filename 
          imagejpeg($img, $filename, 95);
        } // if there is some rotation necessary
      } // if have the exif orientation info
    } // if function exists      
  }

  move_uploaded_file($uploadedFile, $destinationFilename);
  correctImageOrientation($destinationFilename);

?>




<?php
  include ("includes/footer.php");
?>
