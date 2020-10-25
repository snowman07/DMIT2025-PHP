<?php
  include ("includes/header.php");
?>
  
<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">
    This is a simple MySQL CRUDS application of potential employers and business contacts. This application will demonstrate the MySQL queries behind a widespread web usability feature: A listing of items from where the user can select a single item to view in detail:
    <ul class="lead">
      <li>List view (aka thumbnail view if an image is present): A minimum of information shown for many items.</li>
      <li>Single Item View: A whole page and all information available for one item only.</li>
    </ul>
  </p>
  <p class="lead">
    Also, a technique in PHP known as alternate syntax is introduced. This is a different way of writing PHP structures that allows for more PHP blocks, but less actual PHP within an HTML document. 
  </p>
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>

<?php
  // Here, lets retrieve and list all our characters
  $result = mysqli_query($con, "SELECT * FROM arr_contacts ORDER BY arr_bizname ASC");    
?>

<?php while($row = mysqli_fetch_array($result)): ?> <!-- ternary operator with a colon ":" -->
  <!-- ALL of this is simple HTML, then I uses PHP "mixins" to grab the data-->
  <div class="alert alert-info">
    <p class="lead">
      <?php 
        echo "<b>". $row["arr_bizname"] ."</b>"; 
      ?><br>
      <a href="companyprofile.php?id=<?php echo $row['id'] ?> ">View details here </a>
    </p> <!--companyprofile.php?id= is a query string-->
    <!-- 
    <p><?php echo $row["arr_name"]; ?></p>
    -->
  </div>
<?php endwhile; ?> <!-- to end while loop-->

<?php
  include ("includes/footer.php");
?>