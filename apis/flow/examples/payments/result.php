<?php
/**
 * Pagina del comercio para redireccion del pagador
 * A esta página Flow redirecciona al pagador pasando vía POST
 * el token de la transacción. En esta página el comercio puede
 * mostrar su propio comprobante de pago
 */
require(__DIR__ . "/../../lib/Config.class.php");
require(__DIR__ . "/../../lib/FlowApi.class.php");

$config = new Config();

$apikey = $config->get("APIKEY");
$secretkey = $config->get("SECRETKEY");
$apiurl = $config->get("APIURL");
$baseurl = $config->get("BASEURL");

try {
	//Recibe el token enviado por Flow
	if(!isset($_POST["token"])) {
		throw new Exception("No se recibio el token", 1);
	}
	$token = filter_input(INPUT_POST, 'token');
	$params = array(
		"token" => $token
	);
	//Indica el servicio a utilizar
	$serviceName = "payment/getStatus";
	$flowApi = new FlowApi($apikey, $secretkey, $apiurl, $baseurl);
	$response = $flowApi->send($serviceName, $params, "GET");
	
	print_r($response);
	
} catch (Exception $e) {
	echo "Error: " . $e->getCode() . " - " . $e->getMessage();
}

?>