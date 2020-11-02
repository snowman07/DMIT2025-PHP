<?php

$im = imagecreate(200,200);

$green = imagecolorallocate($im, 0, 255, 0);
$red = imagecolorallocate($im, 255, 0, 0);

$points = array(100, 10, 150, 50, 160, 80, 10, 150, 100, 10);
$vertices = count($points)/2;

imagefilledpolygon($im, $points, $vertices, $red); 

header("Content-type: image/png");

imagepng($im);
imagedestroy($im);

?>