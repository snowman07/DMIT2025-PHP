<?php
  include ("includes/header.php");
?>

<div class="row"> 
  <div class="col-sm-8">
    <div class="jumbotron clearfix">
      <h1><?php echo APP_NAME ?></h1>
      <p class="lead">
        This is a finalt project in <i>DMIT 2025</i>  <br>
      </p>
    </div> <!--END of class="jumbotron clearfix" -->
  </div> <!--END of col-sm-8-->
  <div class="col-sm-4">
    <div class="alert alert-info">
      <h2>Filter here:</h2>
      <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div> <!--END of class="alert alert-info"-->
  </div> <!--END of col-sm-4-->
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div> <!--END of row-->


<!--This is for the Thumbnail View-->
<?php
  $result = mysqli_query($con, "SELECT * FROM plant_catalog");
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
      echo "<center>" .$row["plant_name"] ."</center>";
      echo "<span class=\"displayCategory\">Description:</span> <span class=\"displayInfo\">". $plant_description ."</span><br />\n";
	    echo "<span class=\"displayCategory\">Price: $</span> <span class=\"displayInfo\">". $plant_price ."</span><br />\n";
	    echo "<span class=\"displayCategory\">Size:</span> <span class=\"displayInfo\">". $plant_size ."</span><br />\n";
    ?>
  </div> <!--END of style-->
<?php endwhile; ?>
<!--END OF This is for the Thumbnail View-->

<?php
  include ("includes/footer.php");
?>
