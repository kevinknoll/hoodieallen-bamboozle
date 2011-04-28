<!doctype html>
<html>
  <head>
    <title>Hoodie Allen</title>
    <meta charset="utf-8">
    <style>
      canvas {
        border:1px solid #333;
        display:block;
        margin:50px auto;
      }
    </style>
  </head>
  <body>
    <div>

    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script>
      $(document).ready(function(){


        $.ajax({
          url: 'json.php',
          dataType: 'json',
          success: function(d){
            var ratio = 5;
            var w = d['w'] * ratio;
            var h = d['h'] * ratio;
            var pixels = d['pixels'];

            var canvas = document.createElement('canvas'),
            ctx = canvas.getContext('2d');
            canvas.width = w;
            canvas.height = h;

            for (var i = 0; i < pixels.length; ++i) {
              var pixel = pixels[i];
              var x = pixel['x'];
              var y = pixel['y'];
              var r = pixel['r'];
              var g = pixel['g'];
              var b = pixel['b'];
              var a = pixel['a'];
              ctx.fillStyle = 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';
              ctx.fillRect(x*ratio,y*ratio,ratio,ratio);
            }
            $('div').append(canvas);

          }
        });
      });
    </script>
  </body>
</html>