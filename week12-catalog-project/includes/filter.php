<?php
  include ("mysql_connect.php");
?>


<?php
  // // DEFAULT QUERY. IF NOTHING BELOW THEN THIS QUERY WILL STAND; OTHERWISE, IT WILL BE OVERWRITTEN. SHOWS EVERYTHING
  // $sql = "SELECT * FROM plant_catalog";

  // //HERE, WE CAN OVERWRITE THE PREVIOUS QUERY
  // $displayby = $_GET["displayby"];
  // $displayvalue = $_GET["displayvalue"];

  // if($displayby && $displayvalue) {
  //   $sql = "SELECT * FROM plant_catalog WHERE $displayby LIKE '$displayvalue'";
  // }
?>

<?php
  // require("mysql_connect.php");

  // // DEFAULT QUERY: RETRIEVE EVERYTHING
  // $result = mysqli_query($con,"SELECT * FROM plant_catalog") or die (mysql_error());

  // // FILTERING YOUR DB
  // $displayby = $_GET['displayby'];
  // $displayvalue = $_GET['displayvalue'];

  // if(isset($displayby) && isset($displayvalue)) {
  //   // HERE IS THE MAGIC: WE TELL OUR DB WHICH COLUMN TO LOOK IN, AND THEN WHICH VALUE FROM THAT COLUMN WE'RE LOOKING FOR
  //   $result = mysqli_query($con,"SELECT * FROM plant_catalog WHERE $displayby LIKE '$displayvalue' ") or die (mysql_error()); 
  // }

  // /****** ECHO OUT RESULTS ******/
  // while ($row = mysqli_fetch_array($result)) {
  //   $id = $row["id"];
  //   $plant_name = $row["plant_name"];
  //   $plant_description = $row["plant_description"];
  //   $plant_price = $row["plant_price"];
  //   $plant_image = $row["plant_image"];
  //   $plant_size = $row["plant_size"];
  //   $plant_type = $row["plant_type"];
  //   $plant_indoor = $row["plant_indoor"];
  //   $plant_inventory = $row["plant_inventory"];
  //   $plant_allseason = $row["plant_allseason"];
  //   $plant_bestseller = $row["plant_bestseller"];
  // }


  // /****** CREATE A PAGE FOR SINGLE ITEM VIEW ******/

?>


<div id="links">
  <h2><b>Filter here:</b></h2>
  <a href="index.php">All Plants</a><br />
  <!--This is a query string-->
  <a href="index.php?displayby=plant_size&displayvalue=small">Small Plants</a><br />
  <a href="index.php?displayby=plant_size&displayvalue=medium">Medium Plants</a><br />
  <a href="index.php?displayby=plant_size&displayvalue=large">Large Plants</a><br />
  <!--Filter using MySQL BETWEEN-->
  <a href="index.php?displayby=plant_price&min=1&max=40">Plant price ($1 - $40)</a><br />
  <a href="index.php?displayby=plant_price&min=41&max=100">Plant price ($41 - $100)</a><br />
</div>

