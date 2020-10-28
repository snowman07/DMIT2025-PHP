<?php
  include ("includes/header.php");
  include ("includes/_functions.php");


  //////////// pagination
  $getcount = mysqli_query ($con,"SELECT COUNT(*) FROM arr_blog");
  $postnum = mysqli_result($getcount,0);  // this needs a fix for MySQLi upgrade; see custom function below 
  $limit = 3;
  if($postnum > $limit){
    $tagend = round($postnum % $limit,0);
    $splits = round(($postnum - $tagend)/$limit,0);
    if($tagend == 0){
      $num_pages = $splits;
    }else{
      $num_pages = $splits + 1;
    }
    
      if(isset($_GET['pg'])){
        $pg = $_GET['pg'];
      }else{
        $pg = 1;
      }
    
    $startpos = ($pg*$limit)-$limit;
    $limstring = "LIMIT $startpos,$limit";

  }else{
  $limstring = "LIMIT 0,$limit";
  }

  // MySQLi upgrade: we need this for mysql_result() equivalent
  function mysqli_result($res, $row, $field=0) {$res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
  }

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">This is a simple Bootstrap template to assist in creating simple applications in PHP. <br>
    Please make the necessary changes as you need.
  </p>
  <a class="btn btn-primary float-right" href="#" role="button">Button</a>
</div>


<?php
  // Here, lets retrieve and list all our characters
  $result = mysqli_query($con, "SELECT * FROM arr_blog ORDER BY bid DESC $limstring");    
?>

<?php while($row = mysqli_fetch_array($result)): ?> <!-- ternary operator with a colon ":" -->
  <!-- ALL of this is simple HTML, then I uses PHP "mixins" to grab the data-->
  <div class="alert alert-info clearfix">
    <p class="lead float-right">
      <?php 
        $thisDate = strtotime($row["arr_timedate"]);// retrieve data from DB
        $thisDate = date("F j, Y g:i a",$thisDate); // modify using date() function
        //Please edit the format you want and write it to the browser how you like.
        // output $thisDate later in your markup
        //echo "<b>". $row["arr_timedate"] ."</b>"; 
        echo "<i>". $thisDate ."</i>"; 
      ?><br>
    </p>
    <p class="lead">
      <?php 
        echo "<b>". $row["arr_title"] ."</b>"; 
      ?><br>
      <?php 
        echo "<b>". addEmoticons($row["arr_message"]) ."</b>"; 
      ?><br>
      
    </p> <!--companyprofile.php?id= is a query string-->
    <!-- 
    <p><?php echo $row["arr_title"]; ?></p>
    -->
  </div>
<?php endwhile; ?> <!-- to end while loop-->


<?php
  include ("includes/footer.php");
?>