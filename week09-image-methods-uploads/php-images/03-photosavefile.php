<?php

$im = imagecreatefromjpeg("img/horse.jpg");

imagegammacorrect($im, 5.0, 3.0); // kinda like photoshop

/*
To save to a file instead of outputting to the browser

1. Add the path/filename as the 2nd parameter of the output
2. remove the header info because we are NOT outputting to the browser
3. Remember: We will not see anything unless we code it.
*/
imagejpeg($im, "test.jpg");
imagedestroy($im);

?>