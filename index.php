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

else if( substr( $message , 0 , 3)  == "www"){
        $web = file_get_contents($message);
        file_get_contents($path."/sendMessage?chat_id=".$chatId."&text=". $web);
}

else{
        file_get_contents($path."/sendMessage?chat_id=".$chatId."&text=".$message);
}


?>
