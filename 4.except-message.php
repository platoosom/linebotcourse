<?php 
// For debuging
$json = file_get_contents("php://input");
$file = fopen("debut.txt", "w");
fwrite($file, $json);

// OBJECT Event
$content = json_decode($json);

// Require autoload
require_once("vendor/autoload.php");

foreach($content->events as $event ){
    // LINE BOT
    $replyToken = $event->replyToken;
    $message = $event->message->text;
    $replyMessage = "";

    

    switch($message){
        case "hi":
            $replyMessage = "สวัสค่ะ มีอะไรให้บอทรับใช้ดีค๊ะ";
            break;
        case "tel":
            $replyMessage = "02-345-6545";
            break;
        case "address":
            $replyMessage = "88/123 อ.บางใหญ่ จ.นนทบุรี 10120";
            break;
        default:
            $replyMessage = "กรุณาถามคำถามใหม่นะค๊ะ ตอนนี้บอทซัพพอร์ตแค่ 3 คำถาม คือ hi, tel, address";
            break;
    }

    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
    $response = $bot->replyMessage($replyToken, $textMessageBuilder);
}
