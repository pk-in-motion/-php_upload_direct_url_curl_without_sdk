<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
//set_time_limit(0);


$access_token = "1DAlMFR1lfQV4TWwNGRghGBB1SWQgXBEJQRhNVEgVW";


// API1: Get an upload URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.dailymotion.com/file/upload");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Bearer '.$access_token,
    'Content-Type: video/mp4'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec($ch);
//echo $server_output;
print_r($server_output);


//print_r $server_output;
$error_msg = curl_error($ch);
if(!empty($error_msg)){
    echo $error_msg;
    exit;
}
curl_close($ch);


$firstApi = json_decode($server_output, true);
if(isset($firstApi["error"])){
    echo $firstApi["error"]["message"];
    exit;
}


if (isset($firstApi["upload_url"])) {

    $boundary = 'PK-' . md5(time());
    //echo $boundary;

    // API2: Upload the video

    $cFile = "pk_swimming.MOV";
    $post = array('file' => curl_file_create($cFile,"video/*","test.MOV"));


    // below will cause 'invalide filename extension' error
    //$post = $cFile;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $firstApi["upload_url"]);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
          array(
            'Accept: */*; Content-Type: multipart/form-data; Content-Length: '.filesize($cFile).';
            boundary='.$boundary
            )
          );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $result = curl_exec($ch);
    print_r($result);

    $secondApi = json_decode($result, true);

    $error_msg = curl_error($ch);
    print_r($error_msg);

    curl_close($ch);



    if(isset($secondApi["error"])){
        print_r($secondApi);
        exit;
    }
    if(!empty($error_msg)){
        echo $error_msg;
        exit;
    }

    if(isset($secondApi["url"])){
		//echo "adding details to vid ....";
        // API3: Create the video
        $post = ['url' => $secondApi["url"],
                'title' => 'swimming - Aug 2019',
                'channel' => 'sport',
                 'tags' => 'swim,butterfly',
                 'private' => true,
                 'published' => true
               ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.dailymotion.com/me/videos");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = [
            'Authorization: Bearer '.$access_token,
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

        print_r($server_output).PHP_EOL;
    }

    // Output is {"id":"x6p8jg4","title":"Untitled","channel":null,"owner":"x25vuib"}

}
?>
