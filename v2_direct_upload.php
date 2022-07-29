<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.dailymotion.com/video/x7hrm4e",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>
      "title=test curl 1",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer TlcVWkxLAA4MAhAUEgVWDUMCQxtBCwIGXRsZVQoM",
    "Cache-Control: no-cache",
    "Content-Type: application/x-www-form-urlencoded",
    //"Postman-Token: 3421e71a-ffe0-4cd1-9bb4-4c2f7c69b398"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$errNo = curl_errno($curl);

$info = curl_getinfo($curl);
curl_close($curl);
echo '<pre>';
var_dump($info);
echo '</pre>';
if ($err) {
echo "cURL No #:" . $errNo;
    var_dump($response);
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
