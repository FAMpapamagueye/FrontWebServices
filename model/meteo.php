<?php
$code=$_POST['jour'];

$url = "http://localhost:8080/REST_METEO/lamp/meteo/$code";
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
    $meteo=json_decode($response);
    $humi=$meteo->humidite;
    $temp=$meteo->temperature;
    $vitese=$meteo->vitesseVent;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suppression Filiere<?php echo $code;?></title>
</head>
<body>

  <table>
    <tbody>
    
        <tr>
        <td><span>Humidite</span></td>
         <td><span><?php echo $humi;?></span></td>
      </tr>
      <tr>
        <td><span>Temperature</span></td>
         <td><span><?php echo $temp;?></span></td>
      </tr>
      <tr>
        <td><span>Vitesse</span></td>
         <td><span><?php echo $vitese;?></span></td>
      </tr>
      <tr>
        <!-- <td><input type="reset" value="Annuler"></td> -->
         <!-- <td><input type="submit" value="confirmer"></td> -->
         <td><a href="liste.php">retour</a></td>
      </tr>
    </tbody>
  </table>
</body>
</html>