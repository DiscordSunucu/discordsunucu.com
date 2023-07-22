// Örnek PHP Kodu
// Aşağıdaki PHP kodu, API'ye bir GET isteği yaparak oy bilgilerini alır:

<?php
$url = "https://discordsunucu.com/api/vote/SERVER_ID";
//LİMİTLİ ÖRNEK
// $url = "https://discordsunucu.com/api/vote/SERVER_ID?limit=LIMIT";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: Bearer {TOKEN}",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);
?>
