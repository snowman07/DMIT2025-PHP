<!--THE SAME AS WIDGETS-->

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
  <div class="col-sm-9" >
    
    <h2>Random Plants</h2>
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
  </div> <!--END of col-sm-9-->
  <div class="col-sm-3">
    <div class="alert alert-info">
      <?php
        include ("includes/filter.php");
      ?>
    </div> <!--END of class="alert alert-info"-->
  </div> <!--END of col-sm-3-->
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div> <!--END of row-->

<?php
  include ("includes/footer.php");
?>
