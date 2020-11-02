<?php

$im = imagecreate(200, 60);

$bg = imagecolorallocate($im, 100, 0, 0);

$textcolor = imagecolorallocate($im, 0, 255, 255);

//Write some graphical text

imagestring($im, 5, 10, 5, "Hello World", $textcolor);

header("Content-type: image/png");

imagepng($im);
imagedestroy($im);

?>