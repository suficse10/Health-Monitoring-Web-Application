<?php

require("connectdb.inc.php");

      $query = "SELECT DATE_ADD(NOW(), INTERVAL 12 HOUR)";
      $query .= "SELECT DATE_FORMAT(NOW(), '%H:%i:%s %d %M %Y')";
      $query .= "SELECT * FROM `Health Monitor` ORDER BY `ID` DESC LIMIT 100";
      $result = mysql_query($conn,$query);
    /*  echo 'Data: '.$result.'<br>';   */
      echo "<table border=1>";
      while($row = mysql_fetch_array($result))
      {
          echo '<tr><th>Sl No</th><td>';
          echo $row['ID'];
          echo '</td><th>Temperature</th><td>';
          echo $row['Temp'];
          echo '</td><th>Heart Beat</th><td>';
          echo $row['Heart Beat'];
          echo '</td><th>Time & Date</th><td>';
          echo $row['Time & Date'];
          echo '</td></tr>';
      } 
      
    ?>  
 