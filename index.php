<!doctype html>
<html>
  <head>
    <title>Hoodie Allen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <?php
      $img = imagecreatefrompng('logo.png');

      $w = imagesx($img);
      $h = imagesy($img);

      $ratio = 15;

      echo '<style>
        ul {
          height: ' . ($h * $ratio) . 'px;
          width: ' . ($w * $ratio) . 'px;
        }
        li {
          height:' . $ratio . 'px;
          width:' . $ratio . 'px;
        }
      </style>';
    ?>
  </head>
  <body>
    <?php
      echo '<ul>';

      for($y = 0; $y < $h; ++$y)
      {
        for($x = 0; $x < $w; ++$x)
        {
          $pixels = imagecolorat($img, $x, $y);
          $colors = imagecolorsforindex($img, $pixels);

          $a = (127 - $colors['alpha']) / 127;
          if ($a > 0) {
            $l = $ratio*$x;
            $t = $ratio*$y;
            $s = 'style="left:' . $l . 'px;top:' . $t . 'px;opacity:' . $a . '"';
            echo '<li ' . $s . '></li>';
            ++$i;
          }
        }
      }

      echo '</ul>';
    ?>
    <p><?php echo 'built with ' . $i . ' blocks'; ?></p>
  </body>
</html>