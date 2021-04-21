<?php
 $conn = mysqli_connect( "http://sql3.freemysqlhosting.net", "sql3407329" , "h3tzsVCxA1" , "sql3407329") or die("couldn't connect to database"); ;

 $query = "create table userdb(id int , name varchar(20))";
 mysqli_query($query , $conn);

 $query = "INSERT INTO userdb(id, name) VALUES(1 , 'testing')";
 mysqli_query($query , $conn);

?>
