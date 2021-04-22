<?php

 $dbhost = "freedb.tech";
 $dbuser = "freedbtech_ineeddb";
 $dbpass = "polkmn";
 $dbname = "freedbtech_awkase";

 $conn = mysqli_connect( $dbhost , $dbuser , $dbpass , $dbname );

 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }


 $query = "select * from awkase";
 $result = mysqli_query($conn, $query);

 if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo  $row["key"]. " - is: " . $row["value"]. " <br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
