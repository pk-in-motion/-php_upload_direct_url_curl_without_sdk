<?php

$post = ['url' => "http://video.tv18online.com/general/BigBuckBunny.mp4",
        'title' => 'v1 - test 1', 'channel' => 'tech', 'tags' => 'test',
        'published' => true
        ];
echo $post['url'].PHP_EOL;
echo $post['title'].PHP_EOL;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.dailymotion.com/me/videos");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = [
    'Authorization: Bearer 9YTlcVWkxLAA4MAhAUEgVWDUMCQxtBCwIGXRsZVQoM',
    //'Content-Type: video/mp4'
    'Content-Type: application/x-www-form-urlencoded'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = curl_exec($ch);
    if(isset($server_output["error"])){
    print_r($server_output["error"]);
    exit;
}
curl_close($ch);
print_r($server_output);

?>
