<?php
require("connectdb.inc.php");


   if(isset($_GET['data1']) && isset($_GET['data2']))
   {	 
         $temp = $_GET['data1'];
         $hbsen = $_GET['data2'];
	 echo 'Temperature : '.$temp.'<br>';
         echo 'Heart Beat : '.$hbsen.'<br>';

         $query = "INSERT INTO `hms_db`.`hms`(`ID`,`Temp`,`Heart Beat`,`Time & Date`) VALUES ('','$temp','$hbsen',now())";
	 mysql_query($query);
   
      /*   if(mysql_num_rows($query_run)==1)
         {
            echo 'Ok...';
         }
         else
         {
           echo 'Error';
         } */  	   
   }   
?>