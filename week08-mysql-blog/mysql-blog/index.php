<?php
  include ("includes/header.php");
  include ("includes/_functions.php");


  // Pagination 1/3   // One goes BEFORE your main query and is used to create a variable called $limstring
  $getcount = mysqli_query ($con,"SELECT COUNT(*) FROM arr_blog");
  $postnum = mysqli_result($getcount,0);  // this needs a fix for MySQLi upgrade; see custom function below 
  $limit = 5;
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
  function mysqli_result($res, $row, $field=0) {
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
  }
  //END of Pagination 1/3

?>

<div class="jumbotron clearfix">
  <h1><?php echo APP_NAME ?></h1>
  <p class="lead">This is an online Blog application utilizing a MySQL database for storage. New features & concepts: <br>
    <ul class="lead">
      <li>Pagination using MySQL</li>
      <li>Emoticons using str_replace() and an emoticon editor using Javascript</li>
      <li>Autolink URLs</li>
      <li>MySQL Timestamp and formatting</li>
    </ul>
  </p>
  <!-- <a class="btn btn-primary float-right" href="#" role="button">Button</a> -->
</div>


<?php

  // Pagination 2/3. //Your main query that outputs the results will then include the $limstring variable at the end.

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
      <?php     // nl2br: new line to break <br>
        echo "<b>". nl2br(makeClickableLinks(addEmoticons($row["arr_message"]))) ."</b>"; 
      ?><br>
      
    </p> <!--companyprofile.php?id= is a query string-->
    <!-- 
    <p><?php echo $row["arr_title"]; ?></p>
    -->
  </div>
<?php endwhile; ?> <!-- to end while loop-->


<?php

  // // Pagination (3/3) links: perhaps put these BELOW where your results are echo'd out.
  // if($postnum > $limit){
  //   echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
  //   $n = $pg + 1;
  //   $p = $pg - 1;
  //   $thisroot = $_SERVER['PHP_SELF'];
      
  //   //echo "<ul>""</ul>"

  //   if($pg > 1){
  //     //$prev = "<a href=\"$thisroot?pg=$p\"><< prev</a>&nbsp;&nbsp;";
  //     echo "<a href=\"$thisroot?pg=$p\"><< prev</a>&nbsp;&nbsp;";
  //   }
    
  //   for($i=1; $i<=$num_pages; $i++){
  //     if($i!= $pg){
  //       //$currentPage = "<a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
  //       echo "<a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
  //     }else{
  //       echo "$i&nbsp;&nbsp;";
  //     }
  //   }
    
  //   if($pg < $num_pages){
  //     //$next = "<a href=\"$thisroot?pg=$n\">next >></a>";
  //     echo "<a href=\"$thisroot?pg=$n\">next >></a>";
  //   }
  //   echo "&nbsp;&nbsp;";
  // }
  // // ambitious students may want to reformat this. Perhaps use Bootstraps pagination markup.
  // ////////////// end pagination
?>

 <!-- Pagination -->
 <nav aria-label="Page navigation example mt-5">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
            <a class="page-link"
                href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
        </li>

        <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
        </li>
        <?php endfor; ?>

        <li class="page-item <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
            <a class="page-link"
                href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
        </li>
    </ul>
  </nav>



<?php

  include ("includes/footer.php");

?>