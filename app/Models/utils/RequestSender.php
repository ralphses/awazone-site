<?php

namespace App\Models\utils;

use App\Models\monnify\MonnifyConfig;
use App\Models\monnify\MonnifyCredentials;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

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

        return self::send($headers, $url, $body, $method);

       } catch (\Throwable $th) {
        return back(405)->with('error', $th->getMessage());
       }
    }

    private static function send(array $headers, string $url, array $body, $method) {

        switch ($method) {
            case 'POST': {

                $response = Http::withHeaders($headers)->post($url, $body);

                if($response->status() === 401) {
                    
                    $newToken = MonnifyConfig::getAccessToken();
                    Storage::disk('local')->put('token.txt', MonnifyConfig::getAccessToken());
        
                    $newHeader = ['Authorization' => $newToken];
        
                    return Http::withHeaders($newHeader)->post($url, $body);
                    break;
        
                }
        
                return $response;
                break;
            }
            
            case 'GET': {

                $response = Http::withHeaders($headers)->get($url, $body);

                if($response->status() === 401) {
                    
                    $newToken = MonnifyConfig::getAccessToken();
                    Storage::disk('local')->put('token.txt', MonnifyConfig::getAccessToken());
        
                    $newHeader = ['Authorization' => $newToken];
        
                    return Http::withHeaders($newHeader)->get($url, $body);
                    break;
        
                }
        
                return $response;
                break;
            }
                
            
            case 'PUT': {
                $response = Http::withHeaders($headers)->put($url, $body);

                if($response->status() === 401) {
                    
                    $newToken = MonnifyConfig::getAccessToken();
                    Storage::disk('local')->put('token.txt', MonnifyConfig::getAccessToken());
        
                    $newHeader = ['Authorization' => $newToken];
        
                    return Http::withHeaders($newHeader)->put($url, $body);
                    break;
        
                }
        
                return $response;
                break;
            }
              
            
            case 'DELETE': {

                $response = Http::withHeaders($headers)->delete($url, $body);

                if($response->status() === 401) {
                    
                    $newToken = MonnifyConfig::getAccessToken();
                    Storage::disk('local')->put('token.txt', MonnifyConfig::getAccessToken());
        
                    $newHeader = ['Authorization' => $newToken];
        
                    return Http::withHeaders($newHeader)->delete($url, $body);
                    break;
        
                }
        
                return $response;
                break;
            }
                

            default:
                throw new BadRequestException("Method not Supported", 405);
                break;
        }
        
    }
}