<?php 

if(isset($_POST['mysubmit'])){

	$user = trim($_POST['user']);
	$email = trim($_POST['email']);
	$province = trim($_POST['province']);
	$gender = trim($_POST['gender']);
	$newsletter = trim($_POST['newsletter']);
	$comments = trim($_POST['comments']);
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Validation</title>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		.formstyle{ /* optional: in case you don't like the really wide form */
			max-width:650px;
		}

	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div class="container">

		<h1>PHP Form Validation</h1>
		<form name="myform" class="formstyle" method="post" action="#">
		
		<div class="form-group">
		    <label for="user">Name:</label>
		    <input type="text" class="form-control" name="user" value="">  

		  

		  </div>

		  <div class="form-group">
		    <label for="email">Email:</label>
		    <input type="text" class="form-control" name="email" value="">  
		    
		  </div>

		  <div class="form-group">
		    <label for="province">Province:</label>
		   	<select name="province" class="form-control">
				<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NL">Newfoundland and Labrador</option>
				<option value="NS">Nova Scotia</option>
				<option value="ON">Ontario</option>
				<option value="PE">Prince Edward Island</option>
				<option value="QC">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="NT">Northwest Territories</option>
				<option value="NU">Nunavut</option>
				<option value="YT">Yukon</option>
			</select>
			
		  </div>

		  <br>

		  <div class="form-check">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="gender" value="male">Male
			  </label>
			</div>
			<div class="form-check">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="gender" value="female" >Female
			  </label>
			</div>

			<br>

			<div class="form-check">
			  <label class="form-check-label">
			    <input type="checkbox" class="form-check-input" name="newsletter" value="1" >Subscribe to Newsletter
			  </label>
			</div>

			<br>


			<div class="form-group">
			    <label for="comments">Comments:</label>
			   	<textarea name="comments" class="form-control" rows="4"></textarea>  
			  </div>

		   <input type="submit" class="btn btn-primary" name="mysubmit">

		</form>

		


	</div><!-- / .container -->

</body>
</html>