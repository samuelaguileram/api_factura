<?php
require_once 'models/factura.php';
class ApiFactura
{
    public $apitoken;
    public $secrettoken;
    public $url;

    public function __construct(string $apitoken, string $secrettoken,$url)
    {
        $this->apitoken = $apitoken;
        $this->secrettoken = $secrettoken;
        $this->url = $url;
    }


    public function peticionGetTest($endpoint,$metodo)
    {
        try {
            $url = $this->url . "$endpoint";
            $curl = curl_init();
            curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $metodo,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'F-PLUGIN: 9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
                'F-Api-Key: ' . $this->apitoken,
                'F-Secret-Key: ' . $this->secrettoken
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        } catch (\Throwable $th) {
            $data = [
                'status_code' => 500,
                'data' => $th,
                'message' => $th->getMessage()
            ];
            return json_encode($data);
        }
    }

    public function generarFactura(Factura $factura)
    {
        try {
            $url = $this->url . "";
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($factura),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'F-PLUGIN: 9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
                    'F-Api-Key: ' . $this->apitoken,
                    'F-Secret-Key: ' . $this->secrettoken
                  ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        } catch (\Throwable $th) {
            $data = [
                'status_code' => 500,
                'data' => $th,
                'message' => $th->getMessage()
            ];
            return json_encode($data);
        }
    }

    public function generarCliente(Cliente $cliente)
    {
        try {
            $url = $this->url . "/api/v1/clients";
            $curl = curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($cliente),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'F-PLUGIN: 9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
                    'F-Api-Key: ' . $this->apitoken,
                    'F-Secret-Key: ' . $this->secrettoken
                  ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        } catch (\Throwable $th) {
            $data = [
                'status_code' => 500,
                'data' => $th,
                'message' => $th->getMessage()
            ];
            return json_encode($data);
        }
    }

    
}