<!DOCTYPE html>
<html>
<head>
<title>Image Watermark</title>
</head>

<body>
<h2>This file will create a watermark on an Image</h2>

<?php
	// This will be completed in class.

	include("watermark.php");

	mergePix("../img/butterfly.jpg", "../img/watermark.jpg", "outputimage.jpg", 0, 50);

?>

<img src="outputimage.jpg">
</body>
</html>