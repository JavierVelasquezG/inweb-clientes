<?php
/**
 * Pagina del comercio para recibir la confirmación del pago
 * Flow notifica al comercio del pago efectuado
 */
require(__DIR__ . "/../../lib/Config.class.php");
require(__DIR__ . "/../../lib/FlowApi.class.php");

$config = new Config();

$apikey = $config->get("APIKEY");
$secretkey = $config->get("SECRETKEY");
$apiurl = $config->get("APIURL");
$baseurl = $config->get("BASEURL");


try {
	if(!isset($_POST["token"])) {
		throw new Exception("No se recibio el token", 1);
	}
	$token = filter_input(INPUT_POST, 'token');
	$params = array(
		"token" => $token
	);
	$serviceName = "payment/getStatus";
	$flowApi = new FlowApi($apikey, $secretkey, $apiurl, $baseurl);
	$response = $flowApi->send($serviceName, $params, "GET");
	
	//Actualiza los datos en su sistema
	
	print_r($response);
	
	
} catch (Exception $e) {
	echo "Error: " . $e->getCode() . " - " . $e->getMessage();
}
?>