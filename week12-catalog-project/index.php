<?php
  include ("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">
    This is a finalt project in <i>DMIT 2025</i>  <br>
  </p>
</div> <!--END of class="jumbotron clearfix" -->

<div class="row"> 
  <!--DISPLAY ALL PLANTS HERE-->
  <div class="col-sm-8 img-container" style="display: flex; flex-wrap: wrap; justify-content: space-evenly;">
    <!--This is for the Thumbnail View-->
    <?php

      $result = mysqli_query($con, "SELECT * FROM plant_catalog");

      // FILTERING YOUR DB
      $displayby = $_GET['displayby'];
      $displayvalue = $_GET['displayvalue'];

      if(isset($displayby) && isset($displayvalue)) {
        // HERE IS THE MAGIC: WE TELL OUR DB WHICH COLUMN TO LOOK IN, AND THEN WHICH VALUE FROM THAT COLUMN WE'RE LOOKING FOR
        $result = mysqli_query($con,"SELECT * FROM plant_catalog WHERE $displayby LIKE '$displayvalue' ") or die (mysql_error());
        
      }
        
    ?>
    <?php while($row = mysqli_fetch_array($result)): ?> <!-- ternary operator with a colon ":" -->
      
      <!-- 
      <?php $id = ($row['id']); ?>
			<?php $plant_name = ($row['plant_name']); ?>
			<?php $plant_description = ($row['plant_description']); ?>
			<?php $plant_price = ($row['plant_price']); ?>
      <?php $plant_price = ($row['plant_image']); ?>
			<?php $plant_size = ($row['plant_size']); ?>
			<?php $plant_type = ($row['plant_type']); ?>
			<?php $plant_indoor = $row['plant_indoor']; ?>
			<?php $inventory = ($row['plant_inventory']); ?>
      <?php $inventory = ($row['plant_allseason']); ?>
      <?php $inventory = ($row['plant_bestseller']); ?> 
      -->
      
      
      <div style="float: left;
                  width: 350px;
                  height: 450px;
                  border: 3px solid #ccc;
                  margin-bottom: 20px;
                  padding:3px;"
                  >

                  
        <?php $id = ($row['id']); ?>
        <?php $plant_name = ($row['plant_name']); ?>
        <?php $plant_description = ($row['plant_description']); ?>
        <?php $plant_price = ($row['plant_price']); ?>
        <?php $plant_price = ($row['plant_image']); ?>
        <?php $plant_size = ($row['plant_size']); ?>
        <?php $plant_type = ($row['plant_type']); ?>
        <?php $plant_indoor = $row['plant_indoor']; ?>
        <?php $inventory = ($row['plant_inventory']); ?>
        <?php $inventory = ($row['plant_allseason']); ?>
        <?php $inventory = ($row['plant_bestseller']); ?> 


        <!-- <?php $row['id']; ?>
        <?php $row['plant_name']; ?>
        <?php $row['plant_description']; ?>
        <?php $row['plant_price']; ?>
        <?php $row['plant_image']; ?>
        <?php $row['plant_size']; ?>
        <?php $row['plant_type']; ?>
        <?php $row['plant_indoor']; ?>
        <?php $row['plant_inventory']; ?>
        <?php $row['plant_allseason']; ?>
        <?php $row['plant_bestseller']; ?>  -->

        <!-- ////////////THIS IS FOR IMG FROM SQUARE FOLDER--> 
        <a href="display.php?id=<?php echo $row['id'] ?> ">
          <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="uploads/square/<?php echo $row["plant_image"]; ?>"
            style="display: block;
                  margin-left: auto;
                  margin-right: auto;
                  width: 100%;"
      
          >   
        </a>


        

        <?php
          echo "<center><b>" .$row["plant_name"] ."</center></b><br />\n";
          echo "<b>Price: $ </b>". $row["plant_price"] ."<br />\n";
          echo "<b>Size: </b>". $row["plant_size"] ."<br />\n";
         ?>
      </div> <!--END of style-->
    <?php endwhile; ?>
    <!--END OF This is for the Thumbnail View-->

  </div> <!--END of col-sm-9-->

  <div class="col-sm-4">
    <!--FILTER SECTION-->
    <section class="filter">
      <div class="alert alert-info">
        <?php
          include ("includes/filter.php");
        ?>
        
        <!-- <?php
          	// DEFAULT QUERY: RETRIEVE EVERYTHING
            $result = mysqli_query($con,"SELECT * FROM plant_catalog") or die (mysql_error());

            // FILTERING YOUR DB
            $displayby = $_GET['displayby'];
            $displayvalue = $_GET['displayvalue'];

            if(isset($displayby) && isset($displayvalue)) {
              // HERE IS THE MAGIC: WE TELL OUR DB WHICH COLUMN TO LOOK IN, AND THEN WHICH VALUE FROM THAT COLUMN WE'RE LOOKING FOR
              $result = mysqli_query($con,"SELECT * FROM plant_catalog WHERE $displayby LIKE '$displayvalue' ") or die (mysql_error());          
            }

            // DISPLAY RESULTS: Only relevant results thumbnails should be displayed.
            while ($row = mysqli_fetch_array( $result )){
              $plant_name = $row['plant_name '];
              $id = $row['id'];
              echo "<a href=\"display.php?id=$id\">$plant_name</a><br />\n";   
            }

        ?> -->


      </div>
    </section>
    <!--END OF FILTER SECTION-->

    <section class="random">
      <div class="alert alert-info"> 
        <h3>Random Plants</h3>
        <div style="display: flex; flex-wrap: wrap; justify-content: space-evenly;">
          <?php   
            $randomPlants = mysqli_query($con, "SELECT * FROM plant_catalog ORDER BY RAND() LIMIT 2");
            while ($row = mysqli_fetch_array($randomPlants)){
              $plant_name = $row["plant_name"];
              $id = $row["id"];
              $plant_image = $row["plant_image"];

              echo "<div style=\"float: left;
                          width: 350px;
                          height: 300px;
                          border: 2px solid #ccc;
                          margin-bottom: 20px;
                          padding:3px;\"
                    >";
                echo $plant_name;
              echo "</div>";
            }
          ?>  
        </div>
      </div>
    </section>
    

  </div> <!--END of col-sm-3-->
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div> <!--END of row-->

<?php
  include ("includes/footer.php");
?>

<script src="js/main.js">


 
</script>
