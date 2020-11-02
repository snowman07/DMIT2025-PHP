<?php

$im = imagecreatefromjpeg("img/horse.jpg");

imagegammacorrect($im, 5.0, 3.0); // kinda like photoshop

header("Content-type: image/jpeg");
imagejpeg($im);
imagedestroy($im);

?>