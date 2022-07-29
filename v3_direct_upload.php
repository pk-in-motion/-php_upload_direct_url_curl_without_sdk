<?php
//$payload['file'] = 'https://videobank.blob.core.windows.net/athenaliveprod/athenaliveprod/11801/production_files/Hindi/uploaded_video_file/11801.mp4';
$payload['url'] = 'https://videobank.blob.core.windows.net/athenaliveprod/athenaliveprod/11801/production_files/Hindi/uploaded_video_file/11801.mp4';
//$payload['url'] = 'http://video.tv18online.com/general/BigBuckBunny.mp4';
$payload['published'] = true;
$payload['title'] = 'Dailymotion PHP SDK upload test';
$payload['tags'] = 'dailymotion,api,sdk,test';
$payload['channel'] = 'tech';

//$url = $arrayResponse->upload_url;  // The URL which I receive after dailymotion authentication
$url = 'https://api.dailymotion.com/me/videos';

$curlFileUpload = curl_init();
curl_setopt_array($curlFileUpload, array(
    //CURLOPT_URL => $arrayResponse->upload_url,
    CURLOPT_URL => $url,
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
        "authorization: Bearer 1CVkVbUFhFUVQKXgtFCABQXAgbW0QAW0tUDwVIBxxS", //Access token received from Dailymotion
        "cache-control: no-cache",
        "postman-token: dd41b50e-6eda-3b67-c8a9-e209850ce310"
    )
));
$getInfoA = curl_getinfo($curlFileUpload);
$response = curl_exec($curlFileUpload);
$err = curl_error($curlFileUpload);

print_r($getInfoA);
print_r($response);
print_r($err);

curl_close($curlFileUpload);
?>

'''
// ---------------------- Execution Result ----------------------7
p.kertonugroho@D8BXFQF2 ~/KIB/API/PHP_SDK_shell/test_curl_php
$ php v3.php
Array
(
    [url] => https://api.dailymotion.com/me/videos
    [content_type] =>
    [http_code] => 0
    [header_size] => 0
    [request_size] => 0
    [filetime] => -1
    [ssl_verify_result] => 0
    [redirect_count] => 0
    [total_time] => 0
    [namelookup_time] => 0
    [connect_time] => 0
    [pretransfer_time] => 0
    [size_upload] => 0
    [size_download] => 0
    [speed_download] => 0
    [speed_upload] => 0
    [download_content_length] => -1
    [upload_content_length] => -1
    [starttransfer_time] => 0
    [redirect_time] => 0
    [redirect_url] =>
    [primary_ip] =>
    [certinfo] => Array
        (
        )

    [primary_port] => 0
    [local_ip] =>
    [local_port] => 0
    [http_version] => 0
    [protocol] => 0
    [ssl_verifyresult] => 0
    [scheme] =>
    [appconnect_time_us] => 0
    [connect_time_us] => 0
    [namelookup_time_us] => 0
    [pretransfer_time_us] => 0
    [redirect_time_us] => 0
    [starttransfer_time_us] => 0
    [total_time_us] => 0
)
{"id":"x8002o9","title":"Dailymotion PHP SDK upload test","channel":"tech","owner":"x24fekz"}
p.kertonugroho@D8BXFQF2 ~/KIB/API/PHP_SDK_shell/test_curl_php
$

'''
