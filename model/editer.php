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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
</head>
<body>
<form method="post" action="ajouter.php">
  <table>
    <tbody>
      <tr>
        <td><span></span></td>
         <td><input type="hidden" name="code" value="<?php echo $code;?>"></td>
      </tr>
        <tr>
        <td><span>Libelle</span></td>
         <td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
      </tr>
      <tr>
        <td><span>latittude</span></td>
         <td><input type="text" name="latittude" value="<?php echo $latittude;?>"></td>
      </tr>
      <tr>
        <td><span>longitute</span></td>
         <td><input type="text" name="longitude" value="<?php echo $longitude;?>"></td>
      </tr>
      <tr>
        <td><input type="reset" value="Annuler"></td>
         <td><input type="submit" value="Editer"></td>
      </tr>
    </tbody>
  </table>
</form>

    
</body>
</html>