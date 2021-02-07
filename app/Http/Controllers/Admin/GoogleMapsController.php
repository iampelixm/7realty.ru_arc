<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Logs;

class GoogleMapsController extends Controller
{
    public function getCoordinateByAdress(Request $r)
    {
    	$lat = 0; $lng = 0;
        if(($r->term) && (strlen($r->term)>3) ){
            $search = urlencode($r->term);
            $key = config('googlemaps.key');
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address='".$search."'&key=".$key;

            try {
                $resp = Http::withHeaders([
						'Content-Type'  => 'application/json',
					])->get($url);

				$response = $resp->getBody()->getContents();
				$arr = json_decode($response, true);
	
				if (isset($arr['results']['0']['geometry']['location']['lat'])){
                    $lat = $arr['results']['0']['geometry']['location']['lat']; 
                }

                if (isset($arr['results']['0']['geometry']['location']['lng'])){
                $lng = $arr['results']['0']['geometry']['location']['lng'];
				}
         

	        } catch (RequestException $e) {
	        	Log::debug($e->getResponse()->getBody()->getContents());
	            
	            return false;
	        }
            
        } 

       return ['lat' => $lat, 'lng' => $lng];
    }
}
