<html>
  <head>
  <style>
		body {
			background-color: black;
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			font-size: 50px;
			color: white;
			text-align: center;
		}
		.cover {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
		}
		.repeat {
			display: flex;
			flex-wrap: wrap;
			height: 100%;
			justify-content: center;
			align-items: center;
		}
		.repeat span {
			margin: 5px;
		}
	</style>
    <script type="application/javascript">
      var ctx = null;
      var x_icon = 0;
      var y_icon = 0;
      var stepX = 1;
      var stepY = 1;
      var size_x = 23;
      var size_y = 22;
      var canvas_size_x = 300;
      var canvas_size_y = 600;
      var anim_img = null;
      
      function draw() {
        var canvas = document.getElementById("canvas");
        ctx = canvas.getContext("2d");
        anim_img = new Image(size_x, size_y);
        anim_img.onload = function() { setInterval('myAnimation()', 2); }
        anim_img.src = 'scary.png';
      }
      function myAnimation() {
        ctx.clearRect(0, 0, canvas_size_x, canvas_size_y);
       if (x_icon < 0 || x_icon > canvas_size_x - size_x) {stepX = -stepX; }
       if (y_icon < 0 || y_icon > canvas_size_y - size_y) {stepY = -stepY; }
          x_icon += stepX;
          y_icon += stepY;
       ctx.drawImage(anim_img, x_icon, y_icon);
      }
    </script>
  </head>
  <body onload="draw();">
    <canvas id="canvas" width="1500" height="800" style="border:solid 0px;"></canvas>
    <canvas id="canvas" width="1500" height="800" style="border:solid 0px;"></canvas>
    <canvas id="canvas" width="1500" height="800" style="border:solid 0px;"></canvas>
    <canvas id="canvas" width="1500" height="800" style="border:solid 0px;"></canvas>
    <canvas id="canvas" width="1500" height="800" style="border:solid 0px;"></canvas>
    <div class="cover">
		<div class="repeat">
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
			<span>RUN</span>
		</div>
	</div>
  </body>
</html>
