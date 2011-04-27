<!doctype html>
<html>
  <head>
    <title>Hoodie Allen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <?php
      if (isset($_GET['src'])) {
        $src = $_GET['src'];
      } else {
        $src = 'logo.png';
      }
      $img = imagecreatefrompng($src);

      $w = imagesx($img);
      $h = imagesy($img);

      if (isset($_GET['ratio'])) {
        $ratio = $_GET['ratio'];
      } else {
        $ratio = 10;
      }

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
    <p>
      <?php $qs_ratio = 'ratio=' . $ratio; ?>
      <a href="?<?php echo $qs_ratio; ?>">Default</a>
      <a href="?images&amp;<?php echo $qs_ratio; ?>">Default w/ Images</a>
      <a href="?src=logo2.png&amp;<?php echo $qs_ratio; ?>">Logo2</a>
      <a href="?src=logo2.png&amp;images&amp;<?php echo $qs_ratio; ?>">Logo2 w/ Images</a>
      <a href="?src=logo3.png&amp;<?php echo $qs_ratio; ?>">Logo3</a>
      <a href="?src=logo3.png&amp;images&amp;<?php echo $qs_ratio; ?>">Logo3 w/ Images</a>
      <a href="?src=logo4.png&amp;<?php echo $qs_ratio; ?>">Logo4</a>
      <a href="?src=logo4.png&amp;images&amp;<?php echo $qs_ratio; ?>">Logo4 w/ Images</a>
    </p>
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
          'http://a0.twimg.com/profile_images/1289788781/168024_1593477200204_1334138791_31476261_4453376_n_normal.jpg',
          'http://a1.twimg.com/profile_images/1319556134/paramore_normal.jpg',
          'http://a0.twimg.com/profile_images/1100679928/brandwan-sc_normal.jpg',
          'http://a3.twimg.com/profile_images/83148253/muffandme_normal.jpg',
          'http://a0.twimg.com/profile_images/1208984990/dailyboooth_normal.jpg',
          'http://a2.twimg.com/profile_images/1251366721/Snapshot_20110216_3_normal.jpg',
          'http://a1.twimg.com/profile_images/1308462157/13549_104108369605250_100000182616111_108371_13443_n_normal.jpg',

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
            $s = 'left:' . $l . 'px;top:' . $t . 'px;opacity:' . $a . ';';

            echo '<li style="' . $s . '">';
            
            $s = 'background:rgb(' . $colors['red'] . ',' . $colors['green'] . ',' . $colors['blue'] . ');opacity:' . ($a/2) . ';';
            echo '<span style="' . $s . '"></span>';

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