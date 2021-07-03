<?php

//$path = "https://api.telegram.org/bot1746146428:AAF-ID1HMj-jpTCNyTqHE0w48RRjFKJRXP4";
$path = "https://api.telegram.org/bot1703520207:AAHWzisIZxsltY6a0YQhMpUcAA8zrZxyTK4";
$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

 if(isset($_GET['from']) && isset($_GET['text'])){
       $from = $_GET['from'];
       $text = $_GET['text'];
       echo "From ".$from." Message Body ".$text;
       file_get_contents($path."/sendMessage?chat_id=476779655&text=From ".$from."Message Body ".$text);
   }


if( $message == "/start"){
   $keyboard = [
          "keyboard" => [
              [
                  ["text" =>  urlencode('Welcome') ] ,
                  ["text" =>  urlencode('Register') ] ,
                  ["text" =>  urlencode('Book') ]
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

/*


<?php
   $path = "https://api.telegram.org/bot1703520207:AAHWzisIZxsltY6a0YQhMpUcAA8zrZxyTK4";
   

 if(isset($_GET['from']) && isset($_GET['text'])){
       $from = $_GET['from'];
       $text = $_GET['text'];
       echo "From ".$from." Message Body ".$text;
       file_get_contents($path."/sendMessage?chat_id=1788583880&text=From ".$from."Message Body ".$text);
   }

 else{
    echo "Message Failed";
    file_get_contents($path."/sendMessage?chat_id=1788583880&text='message failed'");
    }
//?>
*/

?>
