<?php
$code=$_POST['code'];
$libelle=$_POST['nom'];
$latittude=$_POST['latittude'];
$longitude=$_POST['longitude'];
$url = "http://localhost:8080/REST_METEO/lamp/localite/$code";
// echo "url = $url";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = <<<DATA
<localite>
<id>$code</id>
<latittude>$latittude</latittude>
<longitude>$longitude</longitude>
<nom>$libelle   </nom>
</localite>
DATA;
$headers = array(
   "Accept: application/json",
   "Content-Length: " .strlen($data),
   "Content-Type: application/xml",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


// echo "<br>donne=$data";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
if(curl_errno($curl))
{
    echo 'Erreur Curl : ' . curl_error($curl);
}

curl_close($curl);
// echo $resp;

$Localite=json_decode($resp);
// foreach($listeFilieres as $filiere){
// echo $Filiere->libelle;
header("Location: liste.php");
	echo "<br> ";
// }
