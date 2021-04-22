<?php

$path = "https://api.telegram.org/bot1746146428:AAF-ID1HMj-jpTCNyTqHE0w48RRjFKJRXP4";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if( $message == "/start"){
   $keyboard = [
          "keyboard" => [
              [
                  ["text" =>  urlencode('Welcome') ]
              ]
          ],
          "resize_keyboard" => true
      ];

    file_get_contents($path. "/sendMessage?chat_id=". $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($keyboard));
}
else if( $message == "Welcome"){
      $keyboard = [
                "keyboard" => [
                    [
                        ["text" =>  urlencode('Ready') ]
                    ]
                ],
                "resize_keyboard" => true
            ];

    file_get_contents($path. "/sendMessage?chat_id=". $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($keyboard));

}

else if($message == "Ready"){
    $keyboard = [
                "keyboard" => [
                    [
                        ["text" =>  urlencode('Home') ]
                    ]
                ],
                "resize_keyboard" => true
            ];

    file_get_contents($path. "/sendMessage?chat_id=". $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($keyboard));
  
}

else if($message == "Home"){
    $keyboard = [
                "keyboard" => [
                    [
                        ["text" =>  urlencode('Welcome') ]
                    ]
                ],
                "resize_keyboard" => true
            ];

    file_get_contents($path. "/sendMessage?chat_id=". $chatId . "&text=" . urlencode("MENU") . "&reply_markup=" . json_encode($keyboard));
  
}


else if( substr($message , 0 , 2 ) == "SA" ){
               $keyboard = [
                ['7', '8', '9'],
                ['4', '5', '6'],
                ['1', '2', '3'],
                     ['0']
            ];

            $reply_markup = $telegram->replyKeyboardMarkup([
                'keyboard' => $keyboard, 
                'resize_keyboard' => true, 
                'one_time_keyboard' => true
            ]);

        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$message."?reply_markup=".$reply_markup);
}

else if( $message == "/weather"){
        $location = "Addis Ababa";
        $weather = "cold";
        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text= "Here is the weather in ".$location.": ". $weather);
}

else{
        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$message);
}


?>
