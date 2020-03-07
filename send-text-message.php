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
    $type = $event->type;

    if($type === "message"){
        switch( $event->message->type ){

            

            case "text":
                 

                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);
             

                $replyMessage = "Angry mode \u{100087}  :)";
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
                $response = $bot->replyMessage($replyToken, $textMessageBuilder);
            break;





            case "image":
                $id = $event->message->id;

                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);
            
                $raw = $bot->getMessageContent($id);
                $file = fopen('image.jpg', 'w');
                fwrite($file, $raw->getRawBody());
                fclose($file);

                //Next 

                $replyMessage = "ได้รับรูปภาพแล้ว ";
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
                $response = $bot->replyMessage($replyToken, $textMessageBuilder);
            break;

            case "video":
                $id = $event->message->id;

                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);
            
                $raw = $bot->getMessageContent($id);
                $file = fopen($id.'.mp4', 'w');
                fwrite($file, $raw->getRawBody());
                fclose($file);

                //Next 

                $replyMessage = "ได้รับ video แล้ว";
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
                $response = $bot->replyMessage($replyToken, $textMessageBuilder);
            break;

            case "audio":
                $id = $event->message->id;

                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);
            
                $raw = $bot->getMessageContent($id);

                $file = fopen($id.'.m4a', 'w');
                fwrite($file, $raw->getRawBody());
                fclose($file);

                //Next 

                $replyMessage = "ได้รับ ไฟล์เสียง แล้ว";
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
                $response = $bot->replyMessage($replyToken, $textMessageBuilder);
            break;

            case "sticker":
                $id = $event->message->id;

                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);

                $packageid = $event->message->stickerId;

                $replyMessage = "package id is ". $packageid ;
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
                $response = $bot->replyMessage($replyToken, $textMessageBuilder);
            break;

            case "location":

                $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=');
                $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a90766d6373ab9907d2742e21b380dd3']);

                $address = $event->message->address; 

                $replyMessage = "Your address is ". $address ;
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($replyMessage);
                $response = $bot->replyMessage($replyToken, $textMessageBuilder);
            break;

        }

    }

}

