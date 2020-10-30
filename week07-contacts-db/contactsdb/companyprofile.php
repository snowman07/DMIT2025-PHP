<?php
  include ("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">
    This is all the information of the company.
  </p>
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>

<?php 
  $id = $_GET["id"]; 
?>

<?php
  // Here, lets retrieve and list all our contacts
  $result = mysqli_query($con, "SELECT * FROM arr_contacts WHERE id = '$id'");    
?>

<?php while($row = mysqli_fetch_array($result)): ?> <!--ternary operator with a colon ":" -->
  <!-- ALL of this is simple HTML, then I uses PHP "mixins" to grab the data-->
  <div class="alert alert-info">
    <h2><?php echo $row["arr_bizname"]; ?></h2><br>
    <!--This is an alternate syntax-->
    <!--If the info in DB doesn't exist, there's no output -->
    <?php if($row["arr_name"]): ?>
      <p><b>Name: </b><?php echo $row["arr_name"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_email"]): ?>
      <p><b>Email Address: </b><a href="mailto:<?php echo $row["arr_email"]; ?>"><?php echo $row["arr_email"]; ?></a></p>
    <?php endif; ?>
    <?php if($row["arr_website"]): ?>
      <p><b>Website: </b><a href="<?php echo $row["arr_website"]; ?>" target="_blank"><?php echo $row["arr_website"]; ?></a></p>
    <?php endif; ?>
    <?php if($row["arr_phone"]): ?>
      <p><b>Phone: </b><?php echo $row["arr_phone"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_address"]): ?>
      <p><b>Address: </b><?php echo $row["arr_address"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_city"]): ?>
      <p><b>City: </b><?php echo $row["arr_city"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_prov"]): ?>
      <p><b>Province: </b><?php echo $row["arr_prov"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_desc"]): ?>
      <p><b>Description: </b><?php echo $row["arr_desc"]; ?></p>
    <?php endif; ?>
    <?php if($row["arr_newsletter"]): ?>
      <p><b>Newsletter:</b> Yes</p>
    <?php endif; ?>
    <!--END OF This is an alternate syntax-->
  </div>
<?php endwhile; ?> <!-- to end while loop-->

<?php
  include ("includes/footer.php");
?>