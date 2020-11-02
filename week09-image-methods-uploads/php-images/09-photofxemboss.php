<?php

$im = imagecreatefromjpeg("img/elk.jpg");

$emboss = array(array(2,0,0), array(0,-1,0), array(0,0,-1));

imageconvolution($im, $emboss, 1, 127);

header()

?>