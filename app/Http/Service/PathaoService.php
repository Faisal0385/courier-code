<?php

namespace App\Http\Service;

use App\Models\Order;
use App\Models\Store;
use GuzzleHttp\Client;
use App\Constants\AppConstants;
use App\Models\CourierStore;
use Enan\PathaoCourier\Requests\PathaoOrderRequest;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;


class PathaoService
{

    // protected $base_url = 'https://courier-api-sandbox.pathao.com/';
    protected $base_url = 'https://api-hermes.pathao.com/';
    protected $merchant_url = 'https://merchant.pathao.com/';
    protected $apiKey;
    protected $secretKey;
    protected $client;
    public CourierStore $store;

    public function __construct(?string $type = '', ?CourierStore $store = null, ?string $base_uri_type = AppConstants::PATHAO_API_BASE_URI_TYPE_HERMES)
    {
        if ($store) {
            $this->store = $store;
        }
        $this->client = new Client([
            'base_uri' => $base_uri_type == AppConstants::PATHAO_API_BASE_URI_TYPE_HERMES ? $this->base_url : $this->merchant_url,
        ]);

        if ($type == 'new') {
        } else {
            if ($store) {
                $checkAccessTokenIsValid = $this->checkAccessTokenIsValid();

                if (!$checkAccessTokenIsValid) {
                    $this->requestAccesstoken();
                }
            }
        }
        // if (auth()->user()->myStores) {
        //     $checkAccessTokenIsValid = $this->checkAccessTokenIsValid();
        //     // If access token is not valid request for a new token.
        //     if (!$checkAccessTokenIsValid) {
        //         $this->requestAccesstoken();
        //     }
        // }
    }

    public function Pathao_API_Response(bool $auth = false, string $api, string $method, ?array $data = [])
    {
        try {
            $response = $this->client->request(strtoupper($method), $api, [
                'headers' => $this->setHeaders($auth),
                'json' => ($method === AppConstants::METHOD_TYPE_POST) ? $data : null,
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            // Log only if there is an error
            if ($statusCode >= 400) {
                Log::error("API Error: Status Code {$statusCode} - Response: " . json_encode($responseData));
            }

            return (object) [
                'code' => $statusCode,
                'status' => 'success',
                'data' => $responseData,
            ];
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 500;
            $responseBody = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : 'No response body';

            // Proper JSON decoding with error handling
            $message = 'Unknown error';
            $decodedResponse = json_decode($responseBody, true);
            if (json_last_error() === JSON_ERROR_NONE && isset($decodedResponse['message'])) {
                $message = $decodedResponse['message'];
            }

            Log::error("API Error: Status Code {$statusCode} - Response: {$responseBody}");

            return (object) [
                'code' => $statusCode,
                'status' => 'failed',
                'message' => $message,
            ];
        }
    }

    protected function setHeaders(bool $auth = false)
    {
        $headers = [
            // 'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        if ($auth && $this->store instanceof CourierStore && !empty($this->store->token)) {
            $headers['Authorization'] = 'Bearer ' . $this->store->token;
        }

        return $headers;
    }

    public function getAccessToken(array $cred)
    {
        $url = 'aladdin/api/v1/issue-token';
        $data = $this->Pathao_API_Response(false, $url, AppConstants::METHOD_TYPE_POST, $cred);

        return $data;
    }

    public function getStores()
    {
        $url = 'aladdin/api/v1/stores';
        $data = $this->Pathao_API_Response(true, $url, AppConstants::METHOD_TYPE_GET);

        return $data;
    }

    public function getCities()
    {
        $url = 'aladdin/api/v1/countries/1/city-list';
        $data = $this->Pathao_API_Response(false, $url, AppConstants::METHOD_TYPE_GET);

        return $data;
    }

    public function getZones(int $city_id)
    {
        $url = 'aladdin/api/v1/cities/' . $city_id . '/zone-list';
        $data = $this->Pathao_API_Response(false, $url, AppConstants::METHOD_TYPE_GET);

        return $data;
    }

    public function getAreas(int $zone_id)
    {
        $url = 'aladdin/api/v1/zones/' . $zone_id . '/area-list';
        $data = $this->Pathao_API_Response(false, $url, AppConstants::METHOD_TYPE_GET);

        return $data;
    }

    public function createOrder(array $orderData)
    {
        $url = 'aladdin/api/v1/orders';

        // Prepare request body according to PathaoOrderRequest structure
        $body = [
            'store_id' => $orderData['store_id'],
            'merchant_order_id' => $orderData['merchant_order_id'] ?? null,
            'sender_name' => $orderData['sender_name'],
            'sender_phone' => $orderData['sender_phone'],
            'recipient_name' => $orderData['recipient_name'],
            'recipient_phone' => $orderData['recipient_phone'],
            'recipient_address' => $orderData['recipient_address'],
            // 'recipient_city' => $orderData['recipient_city'],
            // 'recipient_zone' => $orderData['recipient_zone'],
            // 'recipient_area' => $orderData['recipient_area'],
            'delivery_type' => $orderData['delivery_type'] ?? PathaoOrderRequest::DELIVERY_TYPE_NORMAL, // 48 (normal) or 12 (on-demand)
            'item_type' => $orderData['item_type'] ?? PathaoOrderRequest::ITEM_TYPE_PARCEL, // 2 (parcel) or 1 (document)
            'special_instruction' => $orderData['special_instruction'] ?? null,
            'item_quantity' => $orderData['item_quantity'],
            'item_weight' => $orderData['item_weight'],
            'amount_to_collect' => $orderData['amount_to_collect'],
            'item_description' => $orderData['item_description'] ?? null,
        ];

        $data = $this->Pathao_API_Response(true, $url, AppConstants::METHOD_TYPE_POST, $body);

        Log::info("Pathao Order {$orderData['merchant_order_id']} Creation Request: ", (array)$orderData);

        Log::info("Pathao Order {$orderData['merchant_order_id']} Creation Response: ", (array)$data);
        return $data;
    }

    public function viewOrder(Order $order)
    {
        $consignment_id = $order->storeOrder?->consignment_id;
        if ($consignment_id) {
            $url = 'aladdin/api/v1/orders/' . $consignment_id;

            $data = $this->Pathao_API_Response(true, $url, AppConstants::METHOD_TYPE_GET);

            return $data;
        }
    }

    public function checkAccessTokenIsValid(): bool
    {
        $currentTimestamp = time();
        $expirationTime = $this->store->expires_in;

        // Compare the expiration time with the current time
        return $expirationTime >= $currentTimestamp;
    }

    public function requestAccesstoken()
    {
        if (!$this->store) {
            throw new \Exception('Store is not initialized.');
        }

        $cred = [
            'client_id' => $this->store->client_id,
            'client_secret' => $this->store->client_secret,
            'refresh_token' => $this->store->refresh_token,
            'grant_type' => 'refresh_token',
        ];
        $response = $this->getAccessToken($cred);

        if ($response->code == 200) {
            return $this->store->update([
                'token' => $response->data->access_token,
                'refresh_token' => $response->data->refresh_token,
                'expires_in' => time() + $response->data->expires_in
            ]);
        } else {
            return $response->data;
        }
    }

    public function fraudCheck(array $attributes)
    {
        $url = 'api/v1/user/success';
        $data = $this->Pathao_API_Response(true, $url, AppConstants::METHOD_TYPE_POST, $attributes);

        return $data;
    }

    public function getOrderDetails(Order $order)
    {
        $consignment_id = $order->storeOrder?->consignment_id;
        $url = "aladdin/api/v1/orders/" . $consignment_id;

        $data = $this->Pathao_API_Response(true, $url, AppConstants::METHOD_TYPE_GET);

        return $data;
    }
}
