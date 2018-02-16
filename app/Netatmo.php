<?php

namespace App;

class Netatmo{
    public static function temperature($json_data){

        $tabTemp = array();
        for($i=0;$i<sizeof($json_data->{'body'});$i++){

            $measures = $json_data->{'body'}[$i]->{'measures'};

            $cleMacTemp = array();
            foreach($measures as $key=>$value){
                /*Vérification adresse MAC*/
                $regEx = preg_match('/^02/',$key);
                if($regEx == 1){
                    /*Récupération des clés pour adresse MAC*/
                    $cleMacTemp[]=$key;

                }

            }

            if(count($cleMacTemp)==0){
                continue;
            }

            $temp = $json_data->{'body'}[$i]->{'measures'}->{$cleMacTemp[0]}->{'res'};

            $cle = array();
            /*Récupération suite de chiffres*/
            foreach($temp as $key=>$value){
                $cle[]=$key;
            }
            /*Récupération des températures*/
            $temperature= $json_data->{'body'}[$i]->{'measures'}->{$cleMacTemp[0]}->{'res'}->{$cle[0]}[0];
            $tabTemp [] = $temperature;

        }
        /*Moyenne de toutes les stations*/
        $avg_temp = round(array_sum($tabTemp)/sizeof($tabTemp),2);
        return $avg_temp;
    }


    public static function rain($json_data,$description){
        $tabRain = array();
        $pluie = array();
        for($i=0;$i<sizeof($json_data->{'body'});$i++){
            $measures = $json_data->{'body'}[$i]->{'measures'};
            $cleMacRain = array();
            foreach($measures as $key=>$value){
                /*Vérification adresse MAC*/
                $regEx = preg_match('/^05/',$key);
                if($regEx == 1){
                    /*Récupération des clés pour adresse MAC*/
                    $cleMacRain[]=$key;
                }
            }

            $value_rain = $json_data->{'body'}[$i]->{'measures'}->{$cleMacRain[0]}->{$description};
            /*Récupération des données concernant la pluie*/
            if(gettype($value_rain) != "NULL"){
                array_push($pluie,$json_data->{'body'}[$i]->{'measures'}->{$cleMacRain[0]}->{$description});
            }
        }
        /*Moyenne de toutes les stations*/
        $avg_rain_60 = round(array_sum($pluie)/sizeof($pluie),2);
        return $avg_rain_60;
    }

    public static function wind($json_data,$description){
        $tabWind = array();
        $vent= array();

        for($i=0;$i<sizeof($json_data->{'body'});$i++){
            $measures = $json_data->{'body'}[$i]->{'measures'};
            $cleMacWind = array();
            foreach($measures as $key=>$value){
                /*Vérification adresse MAC*/
                $regEx = preg_match('/^06/',$key);
                if($regEx == 1){
                    /*Récupération des clés pour adresse MAC*/
                    $cleMacWind[]=$key;
                }
            }
            /*Récupération des données concernant le vent et les rafales*/
            $value_wind = $json_data->{'body'}[$i]->{'measures'}->{$cleMacWind[0]}->{$description};
            if(gettype($value_wind) != "NULL"){
                array_push($vent,$json_data->{'body'}[$i]->{'measures'}->{$cleMacWind[0]}->{$description});
            }
        }
        /*Moyenne de toutes les stations*/
        $avg_wind = round(array_sum($vent)/sizeof($vent),2);
        return $avg_wind;
    }
}