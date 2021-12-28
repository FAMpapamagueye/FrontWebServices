<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste Localite</title>
</head>
<body>
<table>
    <thead>
        <th>CODE</th> 
        <th>NOM</th>    
        <th>Latittude</th>   
        <th>Longitude</th>
        <th>meteo</th> 
        <th>action</th>    
    </thead>
    
    <tbody>
    <?php
$url = "http://localhost:8080/REST_METEO/lamp/localite";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($curl);

if (curl_errno($curl)) {
	echo curl_error($curl);
}else{
    $listlocalite=json_decode($response);
    
    foreach($listlocalite as $filiere){
        $code=$filiere->id;
        $libelle=$filiere->nom;
        $latittude=$filiere->latittude;
        $longitude=$filiere->longitude;
        echo "
        <tr>
        <td>$code</td>
        <td>$libelle</td>
        <td>$longitude</td>
        <td>$latittude</td>
        <td><a href=\"donnee.php?code=$code\">voir</a>&nbsp;
        <td><a href=\"editer.php?code=$code\">editer</a>&nbsp;
        <a href=\"supprimer.php?code=$code\">Supprimer</a></td>
        
        </tr>
        </br>
        ";
    }
    // echo $response;
    // echo "reponse=$response<br>";
    // var_dump(json_decode($listFiliere));
}
?>
    </tbody>
</table>
</body>
</html>