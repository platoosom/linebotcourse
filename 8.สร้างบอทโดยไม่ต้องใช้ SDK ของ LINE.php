<?php 
// For debuging
$json = file_get_contents("php://input");
$file = fopen("debut.txt", "w");
fwrite($file, $json);

// OBJECT Event
$content = json_decode($json);
$access_toke = 'yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=';

foreach($content->events as $event ){
    // LINE BOT
    $replyToken = $event->replyToken;
  
 
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/bot/message/reply');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer {'.$access_toke.'}'
    ]);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS,  '{
        "replyToken":"'.$replyToken.'",
        "messages":[
            {
                "type": "image",
                "originalContentUrl": "https://example.com/original.jpg",
                "previewImageUrl": "https://example.com/preview.jpg"
            }
        ]
    }'
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_exec($ch);
    curl_close($ch);

}

 