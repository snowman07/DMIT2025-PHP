<?php 

	if(isset($_POST['mysubmit'])){

		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$province = trim($_POST['province']);
		$gender = trim($_POST['gender']);
		$newsletter = trim($_POST['newsletter']);
		$comments = trim($_POST['comments']);

		echo "$username, $email, $province, $gender, $newsletter, $comments";
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
		.container{ /* optional: in case you don't like the really wide form */
			max-width: 650px;
		}

	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<div class="container">
		<h1>PHP Form Validation</h1>
		
		<!--start of form-->
		<form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			
			<!--start of Name-->
			<div class="form-group">
				<label for="username">Name:</label>
				<input type="text" class="form-control" name="username" placeholder="Enter name here" value="">  
			</div>
			<!--end of Name-->
			<br>
			<!--start of Email-->
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" placeholder="Enter email here" value=""> 	
			</div>
			<!--end of Email-->
			<br>
			<!--start of Province-->
			<div class="form-group">
				<label for="province">Province:</label>
				<select name="province" class="form-control">
					<option value="">---Select province---</option>
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
			<!--end of Province-->
			<br>
			<!--start of Gender-->
			<div class="form-group">
				<label for="gender">Gender</label>
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
			</div>
			<!--end of Gender-->
			<br>
			<!--start of Subscribe-->
			<div class="form-check">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="newsletter" value="1" >Subscribe to Newsletter
				</label>
			</div>
			<!--end of Subscribe-->
			<br>
			<!--start of Comments-->
			<div class="form-group">
				<label for="comments">Comments:</label>
				<textarea name="comments" class="form-control" rows="4"></textarea>  
			</div>
			<!--end of Comments-->
			<br><br>
			<input type="submit" class="btn btn-primary" name="mysubmit">

		</form>
		<!--end of form-->
	</div><!-- / .container -->

</body>
</html>