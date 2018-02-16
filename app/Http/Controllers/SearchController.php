<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function postMeteo(Request $request){
        //return redirect()->route('home', ['city' => $request->input('name')]);
        return redirect()->action(
            'SearchController@searchCity', ['name' => $request->input('name')]
        );
    }

    function searchCity($name){
        $cityName = ucfirst($name);
        $url = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $cityName . '&key=AIzaSyAG8PhrtVSWpC4p6YtZ1k3pYX9c77LNH-g&language=fr&region=FR');
        $json_data = json_decode($url);
        $city = $json_data->{'results'}[0]->{'address_components'}[0]->{'long_name'};
        $northeastLat = $json_data->{'results'}[0]->{'geometry'}->{'bounds'}->{'northeast'}->{'lat'};
        $northeastLng = $json_data->{'results'}[0]->{'geometry'}->{'bounds'}->{'northeast'}->{'lng'};
        $southwestLat = $json_data->{'results'}[0]->{'geometry'}->{'bounds'}->{'southwest'}->{'lat'};
        $southwestLng = $json_data->{'results'}[0]->{'geometry'}->{'bounds'}->{'southwest'}->{'lng'};

        /*return view('map', ["data" => "city='.$city.'&lat_ne='.$northeastLat.'&lng_ne='.$northeastLng.'&lat_sw=' .$southwestLat.'&lng_sw='.$southwestLng"]);*/
        //return redirect()->route('test', ["data" => urldecode('?city='.$city.'&lat_ne='.$northeastLat.'&lng_ne='.$northeastLng.'&lat_sw=' .$southwestLat.'&lng_sw='.$southwestLng)]);
        return redirect()->route('search', ['city' => $city, 'lat_ne' => $northeastLat, 'lng_ne' => $northeastLng, 'lat_sw' => $southwestLat, 'lng_sw' => $southwestLng]);
        /*header('Location: Julien_API.php?city='.$city.'&lat_ne='.$northeastLat.'&lng_ne='.$northeastLng.'&lat_sw=' .$southwestLat.'&lng_sw='.$southwestLng);*/
    }
}
