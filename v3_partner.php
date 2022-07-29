<?php
//$payload['file'] = 'https://videobank.blob.core.windows.net/athenaliveprod/athenaliveprod/11801/production_files/Hindi/uploaded_video_file/11801.mp4';
$payload['file'] = 'http://video.tv18online.com/general/BigBuckBunny.mp4';
$payload['published'] = false;
$payload['title'] = 'Dailymotion PHP SDK upload test';
$payload['file'] = 'dailymotion,api,sdk,test';
$payload['channel'] = 'channelName';

$url = $arrayResponse->upload_url;  // The URL which I receive after dailymotion authentication
$curlFileUpload = curl_init();
curl_setopt_array($curlFileUpload, array(
    CURLOPT_URL => $arrayResponse->upload_url,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_CONNECTTIMEOUT=>5000,
    CURLOPT_FOLLOWLOCATION=>true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POST =>1,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => array(
        "content-type: multipart/form-data;",
        "authorization: Bearer {$token_arr['access_token']}", //Access token received from Dailymotion
        "cache-control: no-cache",
        "postman-token: dd41b50e-6eda-3b67-c8a9-e209850ce310"
    )
));
$getInfoA = curl_getinfo($curlFileUpload);
$response = curl_exec($curlFileUpload);
$err = curl_error($curlFileUpload);
curl_close($curlFileUpload;
?>
