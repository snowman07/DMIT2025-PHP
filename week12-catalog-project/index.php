<?php
  include ("includes/header.php");
?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">This is a finalt project in <i>DMIT 2025</i>  <br>
    
  </p>

  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>

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
      echo "<center>" .$row["arr_title"] ."</center>";
    ?>
  </div>
<?php endwhile; ?>
<!--END OF This is for the Thumbnail View-->

<?php
  include ("includes/footer.php");
?>
