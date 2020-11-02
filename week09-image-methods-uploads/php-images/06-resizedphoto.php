<?php

$image = imagecreatefromjpeg("img/butterfly.jpg");

// get original width/height

$width = imagesx($image);
$height = imagesy($image);

$ratio = $width/$height;

// echo "Width: $width ; Height: $height ; Ratio: $ratio";

$new_width = 250; //the desired width for the new resized image
$new_height = $new_width/$ratio;

// now, we create w new image object at the desired size. Then we copy from the original to the new.

$image_resized = imagecreatetruecolor($new_width, $new_height);

imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

//header("Content-type: image/jpeg");

imagejpeg($image_resized, "resized_photo.jpg");

imagepng($image);
imagedestroy($image_resized);

// on your own .. try outputting to a file, then show the file here as 

?>