<?php

$path = "https://api.telegram.org/bot1746146428:AAF-ID1HMj-jpTCNyTqHE0w48RRjFKJRXP4";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if (strpos($message, "/weather") === 0) {
$location = "Addis Ababa";
$weather = "cold";
    sendMessage( $chatId , "Here's the weather in ".$location.": ". $weather , "normal" );
}
else if(substr($message,0,2) == "db" ){
    sendMessage( $chatId , $message." inserted into Database Successfully" , "normal" );
}

else if($message == "/start"){
 $keyboard = [
        "keyboard" => [
            [
                ["text" =>  urlencode('Get Started') ]
                ["text" =>  urlencode('Login/Register') ]
                ["text" =>  urlencode('Visit Website') ]
                ["text" =>  urlencode('About Us') ]
            ]
        ],
        "resize_keyboard" => true
    ];
  sendMessage( $chatId , $message , $keyboard );
}

else{
     sendMessage( $chatId , $message , "normal" );
}

function sendMessage( $chatId , $text , $style){
 
  if( $syle == "normal"){
           file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$text);
  }
  else {
    file_get_contents($path. "/sendMessage?chat_id=". $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($style));
  }
        
}

?>

