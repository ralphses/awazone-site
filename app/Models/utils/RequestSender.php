<?php

namespace App\Models\utils;

use App\Models\monnify\MonnifyConfig;
use App\Models\monnify\MonnifyCredentials;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class RequestSender {


    /**
     * Send Http requests.
     *
     * @param array $headers
     * @param string $url 
     * @param array $body
     * @param mixed $method
     *
     * @throws Exception
     */
    public static function sendRequest(array $headers, string $url, array $body, $method) {

       try {

        $newToken = MonnifyConfig::getAccessToken();

        $headers['Authorization'] = MonnifyCredentials::BEARER_AUTHORIZATION_PREFIX . $newToken;

        $response = self::send($headers, $url, $body, $method);
        
        if($response->status() === 422) {
            self::send($headers, MonnifyCredentials::DELETE_VIRTUAL_ACCOUNT . Auth::user()->username, [], 'DELETE');
            $response = self::send($headers, $url, $body, $method);
        }
        
        return $response;

       } catch (\Throwable $th) {
        // dd($th->getMessage());
       }
    }

    private static function send(array $headers, string $url, array $body, $method) {

        switch ($method) {

            case 'POST': {

                return Http::withHeaders($headers)->post($url, $body);        
                break;
            }
            
            case 'GET': {

                return Http::withHeaders($headers)->get($url, $body);
                break;
            }
                
            
            case 'PUT': {
                return Http::withHeaders($headers)->put($url, $body);
                break;
            }
              
            
            case 'DELETE': {
                
                return Http::withHeaders($headers)->delete($url, $body);
                break;
            }
                

            default:
                # code...
                break;
        }
        
    }
}