<?php

/**
 * ComproPago Integration Library
 * Access ComproPago for payments integration
 * 
 * @author hcasatti
 *
 */
$GLOBALS["LIB_LOCATION"] = dirname(__FILE__);

class CP {

    const version = "0.2.1";

    private $client_id;
    private $client_secret;
    private $access_data;
    private $sandbox = FALSE;

    function __construct($client_id, $client_secret) {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    public function sandbox_mode($enable = NULL) {
        if (!is_null($enable)) {
            $this->sandbox = $enable === TRUE;
        }

        return $this->sandbox;
    }

    /** 
     * CP functions 2-mar-2014
     * Create a checkout preference
     * @param array $preference
     * @return array(json)
     */
    public function get_client_id() {
        return $this->client_id;
    }

    /**
     * CP functions 2-mar-2014
     * Get information for specific payment
     * @param int $id
     * @return array(json)
     */
    public function get_payment_cp($id) {
        //$access_token = $this->get_access_token();
        //$uri_prefix = $this->sandbox ? "/sandbox" : "";
            
        $private_key=$this->client_secret.':';
        $payment_info = CPRestClient::get_cp("/v1/charges/".$id , $private_key);
        return $payment_info;
    }
    public function get_payment_info_cp($id) {
        return $this->get_payment_cp($id);
    }




    /**
     * Get Access Token for API use
     */
    public function get_access_token() {
        $app_client_values = $this->build_query(array(
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'grant_type' => 'client_credentials'
                ));

        $access_data = CPRestClient::post("/oauth/token", $app_client_values, "application/x-www-form-urlencoded");

        $this->access_data = $access_data['response'];

        return $this->access_data['access_token'];
    }

    /**
     * Get information for specific payment
     * @param int $id
     * @return array(json)
     */
    public function get_payment($id) {
        $access_token = $this->get_access_token();

        $uri_prefix = $this->sandbox ? "/sandbox" : "";
            
        $payment_info = CPRestClient::get($uri_prefix."/collections/notifications/" . $id . "?access_token=" . $access_token);
        return $payment_info;
    }
    public function get_payment_info($id) {
        return $this->get_payment($id);
    }

    /**
     * Get information for specific authorized payment
     * @param id
     * @return array(json)
    */    
    public function get_authorized_payment($id) {
        $access_token = $this->get_access_token();

        $authorized_payment_info = CPRestClient::get("/authorized_payments/" . $id . "?access_token=" . $access_token);
        return $authorized_payment_info;
    }

    /**
     * Refund accredited payment
     * @param int $id
     * @return array(json)
     */
    public function refund_payment($id) {
        $access_token = $this->get_access_token();

        $refund_status = array(
            "status" => "refunded"
        );

        $response = CPRestClient::put("/collections/" . $id . "?access_token=" . $access_token, $refund_status);
        return $response;
    }

    /**
     * Cancel pending payment
     * @param int $id
     * @return array(json)
     */
    public function cancel_payment($id) {
        $access_token = $this->get_access_token();

        $cancel_status = array(
            "status" => "cancelled"
        );

        $response = CPRestClient::put("/collections/" . $id . "?access_token=" . $access_token, $cancel_status);
        return $response;
    }

    /**
     * Cancel preapproval payment
     * @param int $id
     * @return array(json)
     */
    public function cancel_preapproval_payment($id) {
        $access_token = $this->get_access_token();

        $cancel_status = array(
            "status" => "cancelled"
        );

        $response = CPRestClient::put("/preapproval/" . $id . "?access_token=" . $access_token, $cancel_status);
        return $response;
    }

    /**
     * Search payments according to filters, with pagination
     * @param array $filters
     * @param int $offset
     * @param int $limit
     * @return array(json)
     */
    public function search_payment($filters, $offset = 0, $limit = 0) {
        $access_token = $this->get_access_token();

        $filters["offset"] = $offset;
        $filters["limit"] = $limit;

        $filters = $this->build_query($filters);

        $uri_prefix = $this->sandbox ? "/sandbox" : "";
            
        $collection_result = CPRestClient::get($uri_prefix."/collections/search?" . $filters . "&access_token=" . $access_token);
        return $collection_result;
    }

    /**
     * Create a checkout preference
     * @param array $preference
     * @return array(json)
     */
    public function create_preference($preference) {
        $access_token = $this->get_access_token();

        $preference_result = CPRestClient::post("/checkout/preferences?access_token=" . $access_token, $preference);
        return $preference_result;
    }

    /**
     * Update a checkout preference
     * @param string $id
     * @param array $preference
     * @return array(json)
     */
    public function update_preference($id, $preference) {
        $access_token = $this->get_access_token();

        $preference_result = CPRestClient::put("/checkout/preferences/{$id}?access_token=" . $access_token, $preference);
        return $preference_result;
    }

    /**
     * Get a checkout preference
     * @param string $id
     * @return array(json)
     */
    public function get_preference($id) {
        $access_token = $this->get_access_token();

        $preference_result = CPRestClient::get("/checkout/preferences/{$id}?access_token=" . $access_token);
        return $preference_result;
    }

    /**
     * Create a preapproval payment
     * @param array $preapproval_payment
     * @return array(json)
     */
    public function create_preapproval_payment($preapproval_payment) {
        $access_token = $this->get_access_token();

        $preapproval_payment_result = CPRestClient::post("/preapproval?access_token=" . $access_token, $preapproval_payment);
        return $preapproval_payment_result;
    }

    /**
     * Get a preapproval payment
     * @param string $id
     * @return array(json)
     */
    public function get_preapproval_payment($id) {
        $access_token = $this->get_access_token();

        $preapproval_payment_result = CPRestClient::get("/preapproval/{$id}?access_token=" . $access_token);
        return $preapproval_payment_result;
    }

	/**
     * Update a preapproval payment
     * @param string $preapproval_payment, $id
     * @return array(json)
     */	
	
	public function update_preapproval_payment($id, $preapproval_payment) {
        $access_token = $this->get_access_token();

        $preapproval_payment_result = CPRestClient::put("/preapproval/" . $id . "?access_token=" . $access_token, $preapproval_payment);
        return $preapproval_payment_result;
    }

    /* **************************************************************************************** */

    private function build_query($params) {
        if (function_exists("http_build_query")) {
            return http_build_query($params, "", "&");
        } else {
            foreach ($params as $name => $value) {
                $elements[] = "{$name}=" . urlencode($value);
            }

            return implode("&", $elements);
        }
    }

}

/**
 * ComproPago cURL RestClient
 */
class CPRestClient {

    const API_BASE_URL = "https://api.compropago.com";//deprecated
    const CP_API_BASE_URL = "https://api.compropago.com";
    /** 
     * CP functions 2-mar-2014
     * Create a checkout preference
     */
    private static function get_connect_cp($uri, $method, $content_type, $auth) {
        /*
        curl_setopt($ch, CURLOPT_USERPWD, $this->_apiKey.":");
        curl_setopt($ch, CURLOPT_URL, "http://api.compropago.com/v1/charges");           // URL API 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  // Cabeceras API
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // No verificamos certificado SSL (no body cares).
        curl_setopt($ch, CURLOPT_POST, 1);               // Peticiones POST
        curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);  // Mandamos el Json
        curl_setopt($ch, CURLOPT_HEADER,0);              //Retornar cabeceras 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);    //Retornar datos de llamada
        $respuesta = curl_exec($ch);
        */

        //echo '-'.$auth.'-'; 
        //echo self::CP_API_BASE_URL . $uri;
        $connect = curl_init(self::CP_API_BASE_URL . $uri);
        curl_setopt($connect, CURLOPT_USERPWD, $auth);
        curl_setopt($connect, CURLOPT_USERAGENT, "ComproPago PHP SDK v" . CP::version);
        curl_setopt($connect, CURLOPT_CAINFO, $GLOBALS["LIB_LOCATION"] . "/cacert.pem");
        curl_setopt($connect, CURLOPT_SSLVERSION, 3);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($connect, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($connect, CURLOPT_HTTPHEADER, array("Accept: application/json", "Content-Type: " . $content_type));

        return $connect;
    }

    

    private static function get_connect($uri, $method, $content_type) { //deprecated
        $connect = curl_init(self::API_BASE_URL . $uri);
        curl_setopt($connect, CURLOPT_USERAGENT, "ComproPago PHP SDK v" . CP::version);
        curl_setopt($connect, CURLOPT_CAINFO, $GLOBALS["LIB_LOCATION"] . "/cacert.pem");
        curl_setopt($connect, CURLOPT_SSLVERSION, 3);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($connect, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($connect, CURLOPT_HTTPHEADER, array("Accept: application/json", "Content-Type: " . $content_type));

        return $connect;
    }

    private static function set_data(&$connect, $data, $content_type) {
        if ($content_type == "application/json") {
            if (gettype($data) == "string") {
                json_decode($data, true);
            } else {
                $data = json_encode($data);
            }

            if(function_exists('json_last_error')) {
                $json_error = json_last_error();
                if ($json_error != JSON_ERROR_NONE) {
                    throw new Exception("JSON Error [{$json_error}] - Data: {$data}");
                }
            }
        }

        curl_setopt($connect, CURLOPT_POSTFIELDS, $data);
    }

    private static function exec($method, $uri, $data, $content_type) {
        $connect = self::get_connect($uri, $method, $content_type);
        if ($data) {
            self::set_data($connect, $data, $content_type);
        }

        $api_result = curl_exec($connect);
        $api_http_code = curl_getinfo($connect, CURLINFO_HTTP_CODE);

        $response = array(
            "status" => $api_http_code,
            "response" => json_decode($api_result, true)
        );

        //echo '-'.$api_http_code.'-';
        //echo '-'.$api_result.'-';

        if ($response['status'] >= 400) {
            throw new Exception ($response['response']['message'], $response['status']);
        }

        curl_close($connect);

        return $response;
    }

    /** 
     * CP functions 2-mar-2014
     * Create a checkout preference
     */
    private static function exec_cp($method, $uri, $data, $content_type, $auth) {
        //echo 'auth abajo'.$auth.'---';

        $connect = self::get_connect_cp($uri, $method, $content_type, $auth);
        if ($data) {
            self::set_data($connect, $data, $content_type);
        }

        $api_result = curl_exec($connect);
        $api_http_code = curl_getinfo($connect, CURLINFO_HTTP_CODE);

        $response = array(
            "status" => $api_http_code,
            "response" => json_decode($api_result, true)
        );

        //echo '-'.$api_http_code.'-';
        //echo '-'.$api_result.'-';

        if ($response['status'] >= 400) {
            throw new Exception ($response['response']['message'], $response['status']);
        }

        curl_close($connect);

        return $response;
    }

    /** 
     * CP functions 2-mar-2014
     * Create a checkout preference
     */
    public static function get_cp($uri, $auth, $content_type = "application/json") {
        //echo ':::'.$auth.':::';
        return self::exec_cp("GET", $uri, null, $content_type, $auth);
    }


    public static function get($uri, $content_type = "application/json") {
        return self::exec("GET", $uri, null, $content_type);
    }

    public static function post($uri, $data, $content_type = "application/json") {
        return self::exec("POST", $uri, $data, $content_type);
    }

    public static function put($uri, $data, $content_type = "application/json") {
        return self::exec("PUT", $uri, $data, $content_type);
    }

}

?>
