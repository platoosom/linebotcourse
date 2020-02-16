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

    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('นี่น้องนะ บอทเอง');
    $response = $bot->replyMessage($replyToken, $textMessageBuilder);
}
