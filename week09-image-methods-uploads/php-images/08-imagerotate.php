<?php

$filename = "img/dog.jpg";

$degrees = 45;

header("Content-type:image/jpeg");

$source = imagecreatefromjpeg($filename);

$rotate = imagerotate($source, $degrees, 0);

imagejpeg($rotate);

imagedestroy($source);

?>