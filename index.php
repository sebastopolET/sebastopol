<?php

 $dbhost = "freedb.tech";
 $dbuser = "freedbtech_ineeddb";
 $dbpass = "polkmn";
 $dbname = "freedbtech_awkase";

 $conn = mysqli_connect( $dbhost , $dbuser , $dbpass , $dbname );
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }

$path = "https://api.telegram.org/bot1746146428:AAF-ID1HMj-jpTCNyTqHE0w48RRjFKJRXP4";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if (strpos($message, "/weather") === 0) {
$location = "Addis Ababa";
$weather = "cold";
   file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
}
else if(substr($message,0,2) == "db" ){
   $query = "insert into awkase(key,value) values('contributed' , '".$message."')";
   mysqli_query($conn, $query);
   mysqli_close($conn);
   file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$message." inserted into Database Successfully");
}

else if($message == "/start"){
 $keyboard = [
        "keyboard" => [
            [
                ["text" =>  urlencode('Welcome to Sebastopol -> #') ]
            ]
        ],
        "resize_keyboard" => true
    ];
 file_get_contents($path. "/sendMessage?chat_id="
        . $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($keyboard));
 
}


else{

file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$message);


}

?>

