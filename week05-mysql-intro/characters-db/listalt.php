



<?php
//================================================//
//========== THIS IS AN ALT SYNTAX TOPIC==========//
//================================================//

    include ("includes/header.php");
?>

<h1>List Characters</h1>

<?php
    // Here, lets retrieve and list all our characters
    $result = mysqli_query($con, "SELECT * FROM characters");    
?>

<?php while($row = mysqli_fetch_array($result)): ?> 
<!-- above is a ternary operator with a colon ":" -->

    <!-- ALL of this is simple HTML, then I uses PHP "mixins" to grab the data-->
    <div class="alert alert-info">
        <h2><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h2>
        <div><b>Age:</b><?php echo $row['age']; ?></div>
        <div><b>Occupation:</b><?php echo $row['occupation']; ?></div>
        <div><b>Description:</b><?php echo $row['description']; ?></div>
    </div>

<!-- to end while loop-->
<?php endwhile; ?>

<?php
    include ("includes/footer.php");
?>