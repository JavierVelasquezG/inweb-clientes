<?php

require __DIR__ . '/../apis/flow/lib/FlowApi.class.php';

class FlowPaymentsApi {
    private $flowApi;
    private $apiURL = "https://sandbox.flow.cl/api"; //  https://sandbox.flow.cl/api | https://www.flow.cl/api
    private $baseURL = "https://inweb.cl/clientes/";

    public function __construct () {
        
        try {

            $this->flowApi = new FlowApi(API_KEY, SECRET_KEY, $this->apiURL, $this->baseURL);

        } catch (Exception $e) {

            echo "Conexion fallida (Flow) " . $e->getMessage();

        }

    }

    public function create ($subject, $amount, $client_email, $rut, $commerceOrder, $currency = "CLP") {
        $optional = array(
            "rut" => "$rut"
        );
        
        $optional = json_encode($optional);
        
        $params = array(
            "commerceOrder" => "$commerceOrder",
            "subject" => "$subject",
            "currency" => "$currency",
            "amount" => $amount,
            "email" => "$client_email",
            "paymentMethod" => 9,
            "urlConfirmation" => $this->baseURL . "/confirm.php",
            "urlReturn" => $this->baseURL ."/result.php",
            "optional" => $optional
        );

        $serviceName = "payment/create";

        try {
            
            $response = $this->flowApi->send($serviceName, $params,"POST");

            $redirect = $response["url"] . "?token=" . $response["token"];

            header("location:$redirect");

        } catch (Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode());

        }

    }

    public function getStatus ($commerceOrder) {
        try {
            $params = array(
                "commerceId" => "$commerceOrder"
            );
            $serviceName = "payment/getStatusByCommerceId";
            $response = $this->flowApi->send($serviceName, $params, "GET");
            
            return $response;
            
            
        } catch (Exception $e) {

            throw new Exception($e->getMessage(), $e->getCode());

        }
    }
}

?>