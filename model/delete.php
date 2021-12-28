<?php

$code=$_GET['code'];

$url = "http://localhost:8080/REST_METEO/lamp/localite/$code";
// echo $url;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
if (curl_errno($curl)) {
	echo curl_error($curl);
}else{
    header("Location: liste.php");
	echo "<br> ";
   
}

