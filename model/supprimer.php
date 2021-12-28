<?php
$code=$_GET['code'];
$url = "http://localhost:8080/REST_METEO/lamp/localite/$code";
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
    $localite=json_decode($response);
    $code=$localite->id;
    $nom=$localite->nom;
    $latittude=$localite->latittude;
    $longitude=$localite->longitude;
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
        <td><span>code</span></td>
         <td><span><?php echo $code;?></span></td>
      </tr>
        <tr>
        <td><span>Libelle</span></td>
         <td><span><?php echo $nom;?></span></td>
      </tr>
      <tr>
        <td><span>latittude</span></td>
         <td><span><?php echo $latittude;?></span></td>
      </tr>
      <tr>
        <td><span>longitude</span></td>
         <td><span><?php echo $longitude;?></span></td>
      </tr>
      <tr>
        <!-- <td><input type="reset" value="Annuler"></td> -->
         <!-- <td><input type="submit" value="confirmer"></td> -->
         <td><a href="delete.php?code=<?php echo $code;?>">comfirmer</a></td>
      </tr>
    </tbody>
  </table>
</body>
</html>