<!--This page if for the display view page-->
<?php
  include ("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">
    This is image information.
  </p>
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>

<?php 
  $id = $_GET["id"]; 
?>

<?php
  // Here, lets retrieve and list all images
  $result = mysqli_query($con, "SELECT * FROM arr_lab7_image_gallery WHERE id = '$id'");    
?>

<?php while($row = mysqli_fetch_array($result)): ?> <!--ternary operator with a colon ":" -->
    <!-- ALL of this is simple HTML, then I uses PHP "mixins" to grab the data-->
    <h2><?php echo $row["arr_title"]; ?></h2><br>
    <!--This is an alternate syntax-->
    <!--If the info in DB doesn't exist, there's no output -->
    <?php if($row["arr_description"]): ?>
        <p><b>Description: </b><?php echo $row["arr_description"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_filename"]): ?>
        <img src="uploads/display/<?php echo $row["arr_filename"]; ?>" >
    <?php endif; ?>


<?php endwhile; ?> <!-- to end while loop-->

<?php
  include ("includes/footer.php");
?>
