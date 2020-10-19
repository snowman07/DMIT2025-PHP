<?php
	include("../includes/header.php");
?>
<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="form-group">
			<label for="alpha">Alpha:</label>
			<input type="text" name="alpha" class="form-control">
		</div>
		<div class="form-group">
			<label for="beta">Beta:</label>
			<textarea name="beta" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
		</div>



</form>
<?php
	include("../includes/footer.php");
?>