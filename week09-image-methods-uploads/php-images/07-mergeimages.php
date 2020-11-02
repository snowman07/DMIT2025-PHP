<?php

$im = imagecreatefromjpeg("img/bear.jpg");

$im2 = imagecreatefromjpeg("img/bird.jpg");

imagecopymerge($im, $im2, 0, 0, 0, 0, 800, 600, 30);

header("Content-type:image/jpeg");

imagejpeg($im);
imagedestroy($im);
imagedestroy($im2);


?>