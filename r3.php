<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" >

	<head>
		<title>Online Health Monitoring System</title>
		
		<link rel="stylesheet" type="text/css" href="Design.css" />
	</head>
	
<body>
	<div id="wrapper">
		<div id="header"><h1 align='center'><font color='#ffffff'>Online Health Monitoring System</font></h1></div>
		<div id="divline">
			<div id="divnav">
			<ul>
				<li><a href="http://localhost/hms/r.php">Home</a></li>
				<li><a href="http://localhost/hms/r2.php">Data</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">More</a></li>
			</ul>
		</div>
		</div>
		<div id=divbody>
     
    <?php

        require("connectdb.inc.php");

        $query = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 10";
        $result = mysql_query($query);

     ?> 
    
	
	<div id="graphDiv1"></div>
	<br />
	<div id="graphDiv2"></div>
	<!--[if IE]><script src="excanvas.js"></script><![endif]-->
	<script src="html5-canvas-bar-graph.js"></script>
	<script>(function () {
	
		function createCanvas(divName) {
			
			var div = document.getElementById(divName);
			var canvas = document.createElement('canvas');
			div.appendChild(canvas);
			if (typeof G_vmlCanvasManager != 'undefined') {
				canvas = G_vmlCanvasManager.initElement(canvas);
			}	
			var ctx = canvas.getContext("2d");
			return ctx;
		}
		
		var ctx = createCanvas("graphDiv1");
		
		var graph = new BarGraph(ctx);
		
		var mydata = [<?php 
            while($info=mysql_fetch_array($result))
            {echo $info['Heart Beat'].',';}
            ?>];
						
		//graph.maxValue = 250;
		graph.margin = 5;
		graph.height = 300;
		graph.width = 450;
	    graph.colors = ["#49a0d8", "#d353a0", "#ffc527", "#df4c27"];
		//graph.xAxisLabelArr = ["North", "East", "West", "South"];
	
			graph.update(mydata); 
	  	
		var ctx2 = createCanvas("graphDiv2");
		
		var graph2 = new BarGraph(ctx2);
		graph2.margin = 2;
		graph2.width = 450;
		graph2.height = 150;
		graph2.xAxisLabelArr = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
		setInterval(function () {
			graph2.update([Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20]);
		}, 1500);

	}());</script>
	
	</div>
                
		<div id=divfooter>Footer</div>
		
	</div>
</body>
</html>