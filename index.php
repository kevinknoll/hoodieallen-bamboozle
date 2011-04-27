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

      $ratio = 25;

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
      $IMAGES = isset($_GET['images']);

      if ($IMAGES) {
        $tmpimgs = array(
          'http://si1.twimg.com/profile_images/1323074925/756c74627iyr_normal.jpg',
          'http://si2.twimg.com/profile_images/1321628111/Photo_32_normal.jpg',
          'http://si3.twimg.com/profile_images/1323137600/207159_551593217679_206800017_31815747_2765284_n_normal.jpg',
          'http://si2.twimg.com/profile_images/1319454215/189594_10150124068089232_589879231_6658568_1993284_n_normal.jpg',
          'http://si3.twimg.com/profile_images/1295355134/photongh_normal.jpg',
          'http://si2.twimg.com/profile_images/322931715/blahhhhh_normal.jpg',
          'http://si1.twimg.com/sticky/default_profile_images/default_profile_0_normal.png',
          'http://si3.twimg.com/sticky/default_profile_images/default_profile_6_normal.png',
          'http://si2.twimg.com/profile_images/1266140209/mh_normal.jpg',
          'http://si2.twimg.com/profile_images/307389904/stockton_normal.jpg',
          'http://si0.twimg.com/profile_images/1168715015/Photo_on_2010-11-15_at_15.44__4_normal.jpg',
          'http://si3.twimg.com/profile_images/953696655/image_normal.jpg',
          'http://si0.twimg.com/profile_images/1246926444/fallon17_normal.jpg',
          'http://si1.twimg.com/profile_images/1324305552/iam_DAME_normal.jpg',
        );
        $tmpimgcnt = count($tmpimgs) - 1;
      }

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

            echo '<li ' . $s . '>';
            if ($IMAGES) {
              echo '<img src="' . $tmpimgs[$i % $tmpimgcnt] . '" width="' . $ratio . '" height="' . $ratio . '">';
            }
            echo '</li>';
            
            ++$i;
          }
        }
      }

      echo '</ul>';
    ?>
    <p><?php echo 'built with ' . $i . ' blocks'; ?></p>
  </body>
</html>