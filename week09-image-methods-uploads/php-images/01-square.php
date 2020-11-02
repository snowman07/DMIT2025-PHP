<?php

/*
PHP Image Methods: 5 things

anytime we are working with image data, we must.... 

1. Create the image object: imagecreate(), imagecreatefromjpeg()
2. Do the image creation or processing we want...
3. Define the header info IF outputting directly to the browser
4. Output either to the browser or to a file
5. Destroy the image object to free up resources
*/

$image = imagecreate(200,200);
$green = imagecolorallocate($image, 0, 255, 0);
imagefill($image,0,0, $green);

header("Content-type: image/png"); // tells the browser to get ready for an image, NOT an html file
imagepng($image);
imagedestroy($image);

?>