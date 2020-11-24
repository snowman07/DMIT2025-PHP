<!--This page if for the display view page-->
<?php
  include ("display.php");
?>

<?php 
  $id = $_GET["id"]; 
?>

<?php
  // Here, lets retrieve and list all images
  $result = mysqli_query($con, "SELECT * FROM plant_catalog WHERE id = '$id'");    
?>

<?php while($row = mysqli_fetch_array($result)): ?> <!--ternary operator with a colon ":" -->
    <!-- ALL of this is simple HTML, then I uses PHP "mixins" to grab the data-->
    <h2><?php echo $row["plant_name"]; ?></h2><br>
    <!--This is an alternate syntax-->
    <!--If the info in DB doesn't exist, there's no output -->
    <?php if($row["plant_description"]): ?>
        <p><b>Description: </b><?php echo $row["plant_description"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_price"]): ?>
        <p><b>Price: </b><?php echo $row["plant_price"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_size"]): ?>
        <p><b>Size: </b><?php echo $row["plant_size"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_type"]): ?>
        <p><b>Type: </b><?php echo $row["plant_type"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_indoor"]): ?>
        <p><b>Indoor: </b><?php echo $row["plant_indoor"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_inventory"]): ?>
        <p><b>Inventory: </b><?php echo $row["plant_inventory"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_allseason"]): ?>
        <p><b>All Season: </b><?php echo $row["plant_allseason"]; ?></p>
    <?php endif; ?>
    <?php if($row["plant_bestseller"]): ?>
        <p><b>BestSeller: </b><?php echo $row["plant_bestseller"]; ?></p>
    <?php endif; ?>
    


<?php endwhile; ?> <!-- to end while loop-->

