<?php
 $conn = mysqli_connect( "http://sql3.freemysqlhosting.net", "sql3407329" , "h3tzsVCxA1" , "sql3407329") or die("couldn't connect to database");
 $query = "create table userdb(id int , name varchar(20))";
 mysqli_query($conn , $query);

 $query = "INSERT INTO userdb(id, name) VALUES(1 , 'testing')";
 mysqli_query($conn , $query);

$query = "select * from userdb";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " <br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
