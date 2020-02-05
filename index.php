<?php

$accessToken = 'YOXHo1+OhddnAt09XpUyh8NalDxTc/cSVEnfrpyeFB2ReGb2o8eANDP7O33gWKuGIQP1FwoRs1sVMMiHep5KJakCxqUrGPY8UwohtnnkCqa6BKpzcublUTLEywqPqpvikb6telPHi+IIpTqt9JR0rgdB04t89/1O/w1cDnyilFU=';//copy Channel access token ตอนที่ตั้งค่ามาใส่

// Get information form LINE API 
$content = file_get_contents('php://input');
$object = json_decode($content, false);

// Create headers
$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Authorization: Bearer {$accessToken}";


foreach($object->events as $event){
    switch($event->type){
        case "message":
            $replaytoken = $event->replyToken;

            // Create body
            $body = '

                {
                    "replyToken": "'.$replaytoken.'",
                    "messages": [
                        {
                            "type": "template",
                            "altText": "this is a buttons template",
                            "template": {
                            "type": "buttons",
                            "actions": [
                                {
                                "type": "message",
                                "label": "PM 6:00",
                                "text": "PM 6:00"
                                },
                                {
                                "type": "message",
                                "label": "PM 7:00",
                                "text": "PM 7:00"
                                },
                                {
                                "type": "message",
                                "label": "PM 8:00",
                                "text": "PM 8:00"
                                },
                                {
                                "type": "message",
                                "label": "PM 9:00",
                                "text": "PM 9:00"
                                }
                            ],
                            "title": "Select the Reservation time",
                            "text": "Last Order : PM 9:00"
                            }
                        }
                    ],
                    "notificationDisabled": false
                }
            ';
        break;
    }
}


// Send information back to LINE API 
callLineApi($headers, $body);


/**
 * Send message to LINE API 
 */
function callLineApi($headers,$body){
    $lineApiUri = "https://api.line.me/v2/bot/message/reply";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$lineApiUri);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
}
    
