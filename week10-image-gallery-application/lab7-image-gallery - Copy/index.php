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
  <div style="float: left;
              width: 350px;
              height: 300px;
              border: 1px solid #ccc;
              margin: 10px;
              padding:3px;
              ">
  <!--<div style="display:flex; flex-flow:column wrap; justify-content:space-between;">-->
    <a href="display.php?id=<?php echo $row['id'] ?> ">
      <img src="uploads/thumbs/<?php echo $row["arr_filename"]; ?>" 
        style="display: block;
              margin-left: auto;
              margin-right: auto;
              width: 100%;"
      >   <!--need to modify the src-->
    </a>
    <?php
      echo "<center>" .$row["arr_title"] ."</center>";
    ?>
  </div>
<?php endwhile; ?>
<!--END OF This is for the Thumbnail View-->

<?php
  include ("includes/footer.php");
?>
