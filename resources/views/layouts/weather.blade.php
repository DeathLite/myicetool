@extends('map')

@section('toto')

@if(isset($json))

    <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-localisation" role="tab" aria-controls="home">Localisation</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list"  data-toggle="list" href="#list-altitude" role="tab" aria-controls="profile">Altitude</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-temperature" role="tab" aria-controls="messages">Temperature</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-zone" role="tab" aria-controls="settings">Zone</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-pluieh" role="tab" aria-controls="settings">Pluie dans l'heure</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-pluied" role="tab" aria-controls="settings">Pluie dans les dernières 24 heures</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-forcevent" role="tab" aria-controls="settings">Force du vent</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-anglevent" role="tab" aria-controls="settings">Angle du vent</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-forcerafale" role="tab" aria-controls="settings">Rafale</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-anglerafale" role="tab" aria-controls="settings">Angle Rafale</a>
        </div>
    </div>

    <div class="col-2">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-localisation" role="tabpanel" aria-labelledby="list-home-list">Longitude Nord Est : {{$lng_ne}} <br> Longitude Sud Ouest : {{$lng_sw}} <br> Latitude Nord Est : {{$lat_ne}} <br> Latitude Sud Ouest : {{$lat_sw}}</div>
            <div class="tab-pane fade" id="list-altitude" role="tabpanel" aria-labelledby="list-profile-list"> L altitude de la zone est actuellement de : {{ $json->{'body'}[0]->{'place'}->{'altitude'} }} mètres</div>
            <div class="tab-pane fade" id="list-temperature" role="tabpanel" aria-labelledby="list-messages-list">La temperature de la zone est actuellement de : {{ $temperature }} °</div>
            <div class="tab-pane fade" id="list-zone" role="tabpanel" aria-labelledby="list-settings-list">La zone ce situe en : {{ $json->{'body'}[0]->{'place'}->{'timezone'} }}</div>
            <div class="tab-pane fade" id="list-pluieh" role="tabpanel" aria-labelledby="list-home-list">Précipitation durant la derniere heure : {{ $json->{'body'}[0]->{'place'}->{'altitude'} }} mètres</div>
            <div class="tab-pane fade" id="list-pluied" role="tabpanel" aria-labelledby="list-profile-list">Précipitation durant les dernières 24 heures : {{ $json->{'body'}[0]->{'place'}->{'altitude'} }} mètres</div>
            {{-- <div class="tab-pane fade" id="list-forcevent" role="tabpanel" aria-labelledby="list-messages-list">La force du vent est actuellement de : {{ $json->{'body'}[0]->{'measures'}->{'02:00:00:05:38:82'}->{'06:00:00:00:f6:12'}->{'wind_strength'} }} mètres</div> --}}
            <div class="tab-pane fade" id="list-anglevent" role="tabpanel" aria-labelledby="list-settings-list">L angle du vent est actuellement de : {{ $json->{'body'}[0]->{'place'}->{'altitude'} }} mètres</div>
            <div class="tab-pane fade" id="list-forcerafale" role="tabpanel" aria-labelledby="list-home-list">La force des rafales est actuellement de : {{ $json->{'body'}[0]->{'place'}->{'altitude'} }} mètres</div>
            <div class="tab-pane fade" id="list-anglerafale" role="tabpanel" aria-labelledby="list-profile-list">L angle des rafales est actuellement de : {{ $json->{'body'}[0]->{'place'}->{'altitude'} }} mètres</div>
        </div>
    </div>

@endisset

@endsection