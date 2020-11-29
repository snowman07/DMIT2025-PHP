<?php
  include ("includes/header.php");
?>




<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">
    List of all the plants  <br>
  </p>
</div> <!--END of class="jumbotron clearfix" -->

<div class="row"> 
  <div class="col-sm-9" style="display: flex; flex-wrap: wrap; justify-content: space-evenly;">
    
      <!--This is for the Thumbnail View-->
      <?php
        $result = mysqli_query($con, "SELECT * FROM plant_catalog");
      ?>
      <?php while($row = mysqli_fetch_array($result)): ?> <!-- ternary operator with a colon ":" -->
        <div style="float: left;
                    width: 350px;
                    height: 300px;
                    border: 2px solid #ccc;
                    margin-bottom: 20px;
                    padding:3px;"
                    >
          <a href="display.php?id=<?php echo $row['id'] ?> ">
            <img src="uploads/thumbs/<?php echo $row["arr_filename"]; ?>" 
              style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 100%;"
            >   <!--need to modify the src-->
          </a>
          <?php
            echo "<center>" .$row["plant_name"] ."</center>";
            echo "<span class=\"displayCategory\">Description:</span> <span class=\"displayInfo\">". $plant_description ."</span><br />\n";
            echo "<span class=\"displayCategory\">Price: $</span> <span class=\"displayInfo\">". $plant_price ."</span><br />\n";
            echo "<span class=\"displayCategory\">Size:</span> <span class=\"displayInfo\">". $plant_size ."</span><br />\n";
          ?>
        </div> <!--END of style-->
      <?php endwhile; ?>
      <!--END OF This is for the Thumbnail View-->
    
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