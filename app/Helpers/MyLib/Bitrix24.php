<?php

	namespace app\Helpers\MyLib;

	use Illuminate\Support\Facades\Http;
	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\RequestException;

	
	class Bitrix24
	{
		
		private $acccountName = '';
		private $userId = '';
		private $secretCode = '';

	  
	    public function __construct($acccountName, $userId, $secretCode)
	    {
	    	$this->acccountName = $acccountName;
	    	$this->userId 		= $userId;
	    	$this->secretCode 	= $secretCode;

	        return $this;
	    }

	    public function crmLeadAdd($data, $title)
	    {

	    	$queryUrl = "https://".$this->acccountName.".bitrix24.ru/rest/".$this->userId."/".$this->secretCode."/crm.lead.add.json";

	    	$name  = $data['name'] ?? '';
	    	$phone = $data['phone'] ?? '';
	    	$email = $data['email'] ?? '';
	    	$text  = $data['text'] ?? '';

			$queryData = http_build_query(array(
				 'fields' => array(
					 "TITLE" => $title,
					 "NAME" => $name,
					 "LAST_NAME" => "",
					 "COMMENTS" => $text,
					 "STATUS_ID" => "NEW",
					 "OPENED" => "Y",
					 "ASSIGNED_BY_ID" => 1,
					 "PHONE" => array(array("VALUE" => $phone, "VALUE_TYPE" => "WORK" )),
					 "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),
					 ),
				 'params' => array("REGISTER_SONET_EVENT" => "Y")
			));

			$curl = curl_init();
			curl_setopt_array($curl, array(
				 CURLOPT_SSL_VERIFYPEER => 0,
				 CURLOPT_POST => 1,
				 CURLOPT_HEADER => 0,
				 CURLOPT_RETURNTRANSFER => 1,
				 CURLOPT_URL => $queryUrl,
				 CURLOPT_POSTFIELDS => $queryData,
			));

			try {
				$result = curl_exec($curl);
				curl_close($curl);
			} catch (RequestException $e) {
	            return $e->getResponse()->getBody()->getContents();
	        }

			$result = json_decode($result, 1);

	    	return $result;
	    }

	}
?>