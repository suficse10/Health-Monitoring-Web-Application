<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" >
	<head>
		<title>Online Health Monitoring System</title>
		
		<link rel="stylesheet" type="text/css" href="Design.css" />
                <meta http-equiv="refresh" content="60" />
	</head>
	
<body>
	<div id="wrapper">
		<div id="header"><h1 align='center'><font color='#f2f2f2'>Online Health Monitoring System</font></h1></div>
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

        $query = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 1";
        $result = mysql_query($query);
    
        //echo "<table border=1>";
        while($row = mysql_fetch_array($result))
        {
          echo"<h3><b><font color='#DF01A5'> Temperature: ".$row['Temp']." &#8451</font></b></h3>";
          echo '<br/>';
          echo"<h3><b><font color='#DF01A5'> Heart Beat: ".$row['Heart Beat']." per minute</font></b></h3>";
          echo '<br/>';
          echo"<h3><b><font color='#DF01A5'> Time & Date: ".$row['Time & Date']."</font></b></h3>";
          echo '<br/>';
          
        } 
      
    ?>
		</div>
		<div id=divfooter>Footer</div>
		
	</div>
</body>
</html>