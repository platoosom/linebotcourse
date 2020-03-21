<?php 
// For debuging
$json = file_get_contents("php://input");
$file = fopen("debut.txt", "w");
fwrite($file, $json);

// OBJECT Event
$content = json_decode($json);

foreach($content->events as $event ){
    // LINE BOT
    $replyToken = $event->replyToken;
    
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/bot/message/reply');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{
        "replyToken":"'.$replyToken.'",
        "messages":[
            {
                "type": "flex",
                "altText": "Flex Message",
                "contents": {
                  "type": "carousel",
                  "contents": [
                    {
                      "type": "bubble",
                      "hero": {
                        "type": "image",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
                        "size": "full",
                        "aspectRatio": "20:13",
                        "aspectMode": "cover"
                      },
                      "body": {
                        "type": "box",
                        "layout": "vertical",
                        "spacing": "sm",
                        "contents": [
                          {
                            "type": "text",
                            "text": "Chare arms",
                            "size": "xl",
                            "weight": "bold",
                            "wrap": true
                          },
                          {
                            "type": "box",
                            "layout": "baseline",
                            "contents": [
                              {
                                "type": "text",
                                "text": "$49",
                                "flex": 0,
                                "size": "xl",
                                "weight": "bold",
                                "wrap": true
                              },
                              {
                                "type": "text",
                                "text": ".99",
                                "flex": 0,
                                "size": "sm",
                                "weight": "bold",
                                "wrap": true
                              }
                            ]
                          }
                        ]
                      },
                      "footer": {
                        "type": "box",
                        "layout": "vertical",
                        "spacing": "sm",
                        "contents": [
                          {
                            "type": "button",
                            "action": {
                              "type": "uri",
                              "label": "Add to Cart",
                              "uri": "https://select2web.com/shop"
                            },
                            "style": "primary"
                          },
                          {
                            "type": "button",
                            "action": {
                              "type": "uri",
                              "label": "Add to whishlist",
                              "uri": "https://select2web.com/shop"
                            }
                          }
                        ]
                      }
                    },
                    {
                      "type": "bubble",
                      "hero": {
                        "type": "image",
                        "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
                        "size": "full",
                        "aspectRatio": "20:13",
                        "aspectMode": "cover"
                      },
                      "body": {
                        "type": "box",
                        "layout": "vertical",
                        "spacing": "sm",
                        "contents": [
                          {
                            "type": "text",
                            "text": "Metal Desk Lamp",
                            "size": "xl",
                            "weight": "bold",
                            "wrap": true
                          },
                          {
                            "type": "box",
                            "layout": "baseline",
                            "flex": 1,
                            "contents": [
                              {
                                "type": "text",
                                "text": "$11",
                                "flex": 0,
                                "size": "xl",
                                "weight": "bold",
                                "wrap": true
                              },
                              {
                                "type": "text",
                                "text": ".99",
                                "flex": 0,
                                "size": "sm",
                                "weight": "bold",
                                "wrap": true
                              }
                            ]
                          },
                          {
                            "type": "text",
                            "text": "Temporarily out of stock",
                            "flex": 0,
                            "margin": "md",
                            "size": "xxs",
                            "color": "#FF5551",
                            "wrap": true
                          }
                        ]
                      },
                      "footer": {
                        "type": "box",
                        "layout": "vertical",
                        "spacing": "sm",
                        "contents": [
                          {
                            "type": "button",
                            "action": {
                              "type": "uri",
                              "label": "Add to Cart",
                              "uri": "https://linecorp.com"
                            },
                            "flex": 2,
                            "color": "#AAAAAA",
                            "style": "primary"
                          },
                          {
                            "type": "button",
                            "action": {
                              "type": "uri",
                              "label": "Add to wish list",
                              "uri": "https://linecorp.com"
                            }
                          }
                        ]
                      }
                    },
                    {
                      "type": "bubble",
                      "body": {
                        "type": "box",
                        "layout": "vertical",
                        "spacing": "sm",
                        "contents": [
                          {
                            "type": "button",
                            "action": {
                              "type": "uri",
                              "label": "See more",
                              "uri": "https://linecorp.com"
                            },
                            "flex": 1,
                            "gravity": "center"
                          }
                        ]
                      }
                    }
                  ]
                }
              }
        ]
    }');

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer {yC/UmILWAiMckHU8JgbetTYyzvGfNoXI8oWTi6wnWvwnuVizBx9W9KjSzTP0q9cBPPRkK+rGyu+QHs4nMb3I0Gvm2EOpHVRHD72QmItiM9o/IAIW76VTKhYlidvXDd4P77sz7yidRJSvr/IiHGScIAdB04t89/1O/w1cDnyilFU=}',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_exec($ch);
    curl_close($ch);

}

