<?php
require("connectdb.inc.php");


   if(isset($_GET['data']))
   {	 
         $temp=$_GET['data'];
	 echo 'Sensor Value : '.$temp.'<br>';

         $query = "INSERT INTO `1044574`.`Health Monitor`(ID,Temp) VALUES ('','$temp')";
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