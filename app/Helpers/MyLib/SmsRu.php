<?php

	namespace app\Helpers\MyLib;

	use Illuminate\Support\Facades\Http;
	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\RequestException;

	
	class SmsRu
	{
		

	    private $token; //bearer-token-for-application

	  
	    public function __construct($token)
	    {


	        $this->token = $token;
	        //dd($this->token);
	        return $this;
	    }

	    public function sendSMS($phone, $text)
	    {

	    	$token = $this->token;
	    	$url = "https://sms.ru/sms/send?api_id=".$token."&to=".$phone."&msg=".$text."&json=1";
	    	try {     
                $resp = Http::withHeaders([
					])->get($url);
				$response = $resp->getBody()->getContents();       

				return true;
	            //return $response;

	        } catch (RequestException $e) {
	            return $e->getResponse()->getBody()->getContents();
	        }
	    	return true;
	    }

	}
?>