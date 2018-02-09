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

        $query = "SELECT * FROM `hms` ORDER BY `ID` DESC LIMIT 100";
        $result = mysql_query($query);
    
        echo "<table align='center' cellpadding='5' cellspacing='3' border=1>";
	echo "<tr><th>Sl No</th><th width='70'>Temperature</th><th>Heart Beat</th><th>Time & Date</th></tr>";
			  
      while($row = mysql_fetch_array($result))
      {
          echo '<tr><td>';
          echo $row['ID'];
          echo '</td><td>';
          echo $row['Temp'];
          echo '</td><td>';
          echo $row['Heart Beat'];
          echo '</td><td>';
          echo $row['Time & Date'];
          echo '</td></tr>';
      } 
      echo "</table>";
      
    ?>
	</div>
                
		<div id=divfooter>Footer</div>
		
	</div>
</body>
</html>