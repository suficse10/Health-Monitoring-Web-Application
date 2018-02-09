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
				<li><a href="http://localhost/hms/r31.php">Analysis</a></li>
				<li><a href="#">More</a></li>
			</ul>
		</div>
		</div>
		<div id=divbody>
     
    <?php

        require("connectdb.inc.php");

        $query = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 10";
        $result = mysql_query($query);
		
		$query2 = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 1";
        $result2 = mysql_query($query2);
		
		$query3 = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 1";
        $result3 = mysql_query($query3);
		
		$query4 = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 10";
        $result4 = mysql_query($query4);
    
        //echo "<table border=1>";
        /* while($row = mysql_fetch_array($result2))
        {
          
		  echo"<h3><b><font color='#DF01A5'> Time & Date: ".$row['Time & Date']."</font></b></h3>";
          echo '<br/>';
		  
          echo"<h3><b><font color='#DF01A5'> Heart Beat: ".$row['Heart Beat']." bpm</font></b></h3>";
          echo '<br/>';
		  
		  if($row['Heart Beat'] > 100)
		  {echo"HIGH";}
	      else if($row['Heart Beat'] < 70)
		  {echo"LOW";}
	      else if(($row['Heart Beat'] > 70)&&($row['Heart Beat'] < 100))
		  {echo"NORMAL";}
		  
		  echo"<h3><b><font color='#DF01A5'> Temperature: ".$row['Temp']." &#8451</font></b></h3>";
          echo '<br/>';
          
        } */

     ?> 
    
	<?php
	echo"<h2>Heart Beat Analysis:</h2>";
	while($hb = mysql_fetch_array($result2))
        {
          
          echo"<h3><b><font color='#DF01A5'> Heart Beat: ".$hb['Heart Beat']." bpm</font></b></h3>";
          echo '<br/>';
		  //echo"<h3><b><font color='#DF01A5'> Condition: </font></b></h3>";
		  if($hb['Heart Beat'] >= 100)
		  {//echo"HIGH";
	       echo"<h3><b><font color='#DF01A5'> Condition: <span style=color:red>HIGH</span></font></b></h3>";}
	      else if($hb['Heart Beat'] < 70)
		  {//echo"LOW";
	       echo"<h3><b><font color='#DF01A5'> Condition: <span style=color:blue>LOW</span></font></b></h3>";}
	      else if(($hb['Heart Beat'] >= 70)&&($hb['Heart Beat'] < 100))
		  {//echo"NORMAL";
	       echo"<h3><b><font color='#DF01A5'> Condition: <span style=color:green>NORMAL</span></font></b></h3>";}
	  
        }
	?>	
	
	<br />
	<div id="graphDiv1"></div>
	<br />
	
	
	<?php
	echo"<h2>Temperature Analysis:</h2>";
	while($tmp = mysql_fetch_array($result3))
        {
          
		  echo"<h3><b><font color='#DF01A5'> Temperature: ".$tmp['Temp']." &#8451</font></b></h3>";
          echo '<br/>';
		  if($tmp['Temp'] > 36)
		  {echo"<h3><b><font color='#DF01A5'> Condition: <span style=color:red>HIGH</span></font></b></h3>";}
	      else if($tmp['Temp'] < 30)
		  {echo"<h3><b><font color='#DF01A5'> Condition: <span style=color:blue>LOW</span></font></b></h3>";}
	      else if(($tmp['Temp'] >= 30)&&($tmp['Temp'] <= 36))
		  {echo"<h3><b><font color='#DF01A5'> Condition: <span style=color:green>NORMAL</span></font></b></h3>";}
          
        }
		?>
	
	
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
		graph.margin = 3;
		graph.height = 300;
		graph.width = 450;
	    graph.colors = ["#49a0d8", "#d353a0", "#ffc527", "#df4c27"];
		//graph.xAxisLabelArr = ["North", "East", "West", "South"];
	    setInterval(function () {
			graph.update(mydata); }, 1500);
	  	
		var ctx2 = createCanvas("graphDiv2");
		
		var graph2 = new BarGraph(ctx2);
		
		var mydata2 = [<?php 
            while($info=mysql_fetch_array($result4))
            {echo $info['Temp'].',';}
            ?>];
		graph2.margin = 3;
		graph2.width = 450;
		graph2.height = 200;
		//graph2.xAxisLabelArr = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"];
		graph2.update(mydata2);
		/* setInterval(function () {
			graph2.update([Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20, Math.random() * 20]);
		}, 1500); */

	}());</script>
	
	</div>
                
		<div id=divfooter><h4 align="center">Project of Department of Computer Science & Engineering, CUET</h4></div>
		
	</div>
</body>
</html>