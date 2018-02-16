<?php

namespace App\Http\Controllers;

require_once(app_path().'/Netatmo/autoload.php');
require_once(app_path().'/Netatmo/Config.php');
require_once (app_path().'/Netatmo/Utils.php');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Netatmo\Common\NAScopes;
use Netatmo\Clients\NAWSApiClient;
use App\Netatmo;

class MeteoController extends Controller
{
    function getMeteo(Request $request){
        $scope = NAScopes::SCOPE_READ_THERM." " .NAScopes::SCOPE_WRITE_THERM;

        //Client configuration from Config.php
        $conf = array("client_id" => '5a210976902a40f7a18bb836',
            "client_secret" => 'PhOYOp5HYTjLsvvg9n4PrhGtPueYObB8dkzIzIHRL4',
            "username" => 'dolbac66@gmail.com',
            "password" => 'comingsoon6612@',
            "scope" => 'read_station read_thermostat write_thermostat');
        $client = new NAWSApiClient($conf);

        try
        {
            $tokens = $client->getAccessToken();
            $refresh_token = $tokens['refresh_token'];
            $access_token = $tokens['access_token'];
        }
        catch(Netatmo\Exceptions\NAClientException $ex)
        {
            $error_msg = "An error happened  while trying to retrieve your tokens \n" . $ex->getMessage() . "\n";
            handleError($error_msg, TRUE);
        }

        $array['lat_ne'] = $request->input('lat_ne');
        $array['lng_ne'] = $request->input('lng_ne');
        $array['lat_sw'] = $request->input('lat_sw');
        $array['lng_sw'] = $request->input('lng_sw');


        $netatmo = file_get_contents('https://api.netatmo.com/api/getpublicdata?access_token='.$access_token.'&lat_ne='.$array['lat_ne'].'&lon_ne='.$array['lng_ne'].'&lat_sw='.$array['lat_sw'].'&lon_sw='.$array['lng_sw']);
        $array['json'] = json_decode($netatmo); // Ne servira peut etre a rien

        //dd($array['json']->{'body'}[0]->{'measures'}->{"02:00:00:1f:6e:1c"}->{"res"});
        $array['temperature'] = Netatmo::temperature($array['json']);

        return view('layouts.weather', $array);
        //return redirect()->route('test', ["data" => '?city='.$city.'&lat_ne='.$northeastLat.'&lng_ne='.$northeastLng.'&lat_sw=' .$southwestLat.'&lng_sw='.$southwestLng]);
    }
}
