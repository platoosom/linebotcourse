<?php
// Require LINE Messaging SDK 
require_once("vendor/autoload.php"); 

// Data from LINE API 
$json = file_get_contents('php://input');
$content = json_decode( $json, false );

// Debug
debug($json);

// Prepare Bot Object
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('YOXHo1+OhddnAt09XpUyh8NalDxTc/cSVEnfrpyeFB2ReGb2o8eANDP7O33gWKuGIQP1FwoRs1sVMMiHep5KJakCxqUrGPY8UwohtnnkCqa6BKpzcublUTLEywqPqpvikb6telPHi+IIpTqt9JR0rgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '8650d85cd6caadce6b5342dc093e4c50']);


foreach($content->events as $event){
    switch($event->type){
        case "message":
            switch($event->message->type){
                // Text message 
                case "message":
                    $resmessage = get_response_message($event->message->text);

                    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($resmessage);
                    $response = $bot->replyMessage($event->replyToken, $textMessageBuilder);
                break;
                // Sticker message
                case "sticker":
                    $packageId = 11537;
                    $stickerId = 52002737;
                    $stickerMessageBuilder = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder($packageId, $stickerId);
                    $response = $bot->replyMessage($event->replyToken, $stickerMessageBuilder);
                break;
                // Image message
                case "image":
                    $image_id = $event->message->id;
                    $raw = $bot->getMessageContent($image_id); 
                    $fileName = "images/{$image_id}.jpg";
                    $file = fopen($fileName, 'w'); 
                    fwrite($file, $raw->getRawBody());

                    $resmessage = "Your image ID is {$image_id} and your file name is {$fileName}";
                    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($resmessage);
                    $response = $bot->replyMessage($event->replyToken, $textMessageBuilder);
 
                break;

            }

        break;
    }
}

/**
 * Apropiate response text 
 */
function get_response_message($input){
    $resp = "";

    // Select reponse text
    switch($input){
        case "tel":
            $resp = "089-0638436";
            break;
        case "loc":
            $resp = "99/547 บางมด";
            break;
        default:
            $resp = "I don't undestand your question '".$input."'. You can type tel (for contact number), loc (for location)";
    }

    return $resp;
}

/**
 * Debug
 */
function debug($message){
    $file = fopen("debug.txt", "w");
    fwrite($file, $message);
    fclose($file);
}