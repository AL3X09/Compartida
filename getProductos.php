<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8002",
  CURLOPT_URL => "http://server:8002/api/Pqr_Productos/ProductosConsultarTodo",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{\r\n  \"UsuarioID\": 1020747677,\r\n  \"Clave\": \"123456\",\r\n  \"Usuario\": 1020747677,\r\n  \"DirIp\": \"100.100.100.100\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 63fcbcbd-5776-5d0c-c986-03d2aa5a0b03"
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