<?php

$curl = curl_init();
$id = $_REQUEST['url'];
print_r("id",$id);
$searchForID="{
	\r\n  \"IdCiudad\": ".$id.",
	\r\n  \"Nombre\": null,
	\r\n  \"CodigoDANE\": null,
	\r\n  \"CodigoTercero\": null,
	\r\n  \"Activo\": null,
	\r\n  \"IdDepartamento\": null,
	\r\n}";

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8002",
  CURLOPT_URL => "http://server:8002/api/Pqr_Tipificacion/PqrTipificacionConsultarUno?idTipificacion=%7BidTipificacion%7D",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => $searchForID ,
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 36167db6-6fed-8f05-a635-e89a23138f20"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
/* se desactiva ya que solo permite recivir xml 
$xml = $_REQUEST['IdTipificacion'];

$result = array();

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

$x=$xmlDoc->getElementsByTagName('item');
$length = $x->length;
//print_r($xml);
for ($i=0; $i<$length; $i++){
	$item_title=$x->item($i)->getElementsByTagName('title')
		->item(0)->childNodes->item(0)->nodeValue;
	$item_link=$x->item($i)->getElementsByTagName('link')
		->item(0)->childNodes->item(0)->nodeValue;
	$item_desc=$x->item($i)->getElementsByTagName('description')
		->item(0)->childNodes->item(0)->nodeValue;
	$item_pubdate=$x->item($i)->getElementsByTagName('pubDate')
		->item(0)->childNodes->item(0)->nodeValue;
  
	$row = array('title'=>$item_title,'link'=>$item_link,'description'=>$item_desc,'pubdate'=>$item_pubdate);
	array_push($result, $row);
}


//$doc = new DOMDocument();
//$doc->loadHTML($xml);
//echo $doc->saveHTML();
echo json_encode($result);

?> 