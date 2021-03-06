<?php

//ini_set("display_errors", "on");

require_once './functions.php';
//if (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) {
ini_set("display_errors", "on");
session_start();

$config = parse_ini_file('Config.ini');
$functions = new functions();
$idTyping = (isset($_REQUEST["IdTipificacion"])) ? $_REQUEST["IdTipificacion"] : "null";
$name = (isset($_REQUEST["Nombre"])) ? $_REQUEST["Nombre"] : "null";
$status = (isset($_REQUEST["Activo"])) ? $_REQUEST["Activo"] : "null";
$dependece = (!isset($_POST["id"]) || empty($_POST["id"])) ? 0 : $_POST["id"];
$codeSuper = (isset($_REQUEST["CodigoSuper"])) ? $_REQUEST["CodigoSuper"] : "null";
$timeResponse = (isset($_REQUEST["TiempoEstimadoRespuesta"])) ? $_REQUEST["TiempoEstimadoRespuesta"] : "null";


$ipUser = $functions->getRealIp();
$idUser = 1013660676;//$_SESSION["id-user"];
$array = peticion($idTyping, $name, $status, $dependece, $codeSuper, $timeResponse, $idUser, $ipUser);

function peticion($idTyping, $name, $status, $dependece, $codeSuper, $timeResponse, $idUser, $ipUser) {
    $paramsRequest = "{\r\n  \"IdTipificacion\": " . $idTyping . "," .
            "\r\n  \"Nombre\":$name," .
            "\r\n  \"Activo\":  $status ," .
            "\r\n  \"Padre\":  $dependece  ," .
            "\r\n  \"CodigoSuper\" : $codeSuper," .
            "\r\n  \"TiempoEstimadoRespuesta\": $timeResponse ," .
            "\r\n  \"Usuario\": " . $idUser . "," .
            "\r\n  \"DirIp\": \"" . $ipUser . "\" \r\n}";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_PORT => "8002",
        CURLOPT_URL => "http://server:8002/api/Pqr_Tipificacion/PqrTipificacionConsultarFiltros",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $paramsRequest,
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: bc938f3a-0fea-53bc-b427-78f64b359661"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return json_decode($response, true);
    }
}

if (!is_array($array)) {
    var_dump($array);
} else {
    $result = array();
    $row;
    $ciclo = 0;
    foreach ($array as $key => $value) {
        $hasCildren = sizeof(peticion("null", "null", "null", $value["IdTipificacion"], "null", "null", "null", "null"));
        $row = array(
            "IdTipificacion" => $value["IdTipificacion"],
            "id" => $value["IdTipificacion"],
            "Nombre" => $value["Nombre"],
            "text" => $value["Nombre"],
            "Activo" => $value["Activo"],
            "Padre" => $value["Padre"],
            "CodigoSuper" => $value["CodigoSuper"],
            "TiempoEstimadoRespuesta" => $value["TiempoEstimadoRespuesta"],
            "state" => ($hasCildren > 0) ? "closed" : "open",
            "total" => $hasCildren,
        );
        $ciclo ++;

        array_push($result, $row);
    }
//    var_dump($result);
    echo json_encode($result, true);
}