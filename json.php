<?php
$img = imagecreatefrompng('logo3.png');

$w = imagesx($img);
$h = imagesy($img);

$pixels = array();

for($y = 0; $y < $h; ++$y)
{
  for($x = 0; $x < $w; ++$x)
  {
    $pixel = imagecolorat($img, $x, $y);
    $colors = imagecolorsforindex($img, $pixel);

    $a = (127 - $colors['alpha']) / 127;
    if ($a > 0) {
      array_push($pixels,array('x' => $x, 'y' => $y, 'r' => $colors['red'], 'g' => $colors['green'], 'b' => $colors['blue'], 'a' => $a));
    }
  }
}

$data = array('w' => $w, 'h' => $h, 'pixels' => $pixels);
echo json_encode($data);
?>