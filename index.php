<?php

$path = "https://api.telegram.org/bot1746146428:AAF-ID1HMj-jpTCNyTqHE0w48RRjFKJRXP4";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

$keyboard = [
              'keyboard' => [['Button1'],['Button2']],
              'resize_keyboard' => true,
              'one_time_keyboard' => true,
              'selective' => true
            ];

$keyboard = json_encode($keyboard, true);


file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$message);
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$reply."&parse_mode=HTML&reply_markup=$keyboard");


/*
switch($message){
  case "/start" : 
            $keyboard = [
                            "keyboard" => [
                                [
                                    ["text" =>  urlencode('Get Started') ]
                                    
                                ]
                            ],
                        "resize_keyboard" => true
                      ];
            sendMessage( $chatId , $message , $keyboard );
            break;
  case "/weather":
        $location = "Addis Ababa";
        $weather = "cold";
        sendMessage( $chatId , "Here's the weather in ".$location.": ". $weather , "normal" );
        break;

  default:
     sendMessage( $chatId , $message , "normal" );
     if( substr($message,0,2) == "db"){
            sendMessage( $chatId , $message." inserted into Database Successfully" , "normal" );
     
}

function sendMessage( $chatId , $text , $style){
 
  if( strpos($style , "normal") === 0 ){
           file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$text);
   }
  else {
    file_get_contents($path. "/sendMessage?chat_id=". $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($style));
  }
        
}
*/
?>
