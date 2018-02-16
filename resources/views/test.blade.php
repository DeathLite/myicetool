<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<div id="map"></div>
<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6D1kkZiROsc-qUItL0_uQcBwv_2P894k&callback=initMap">
</script>
</body>
</html>
Premiers pas
Trois étapes sont nécessaires pour créer une carte Google avec un marqueur sur votre page Web :

Créer une page HTML
Ajouter une carte avec un marqueur
Obtenir une clé d'API
Il vous faut un navigateur Web. Choisissez-en un connu comme Google Chrome (recommandé), Firefox, Safari ou Internet Explorer, en fonction de votre plateforme.


Étape 1 : Créer une page HTML
Voici le code d'une page Web HTML de base :

<h3>My Google Maps Demo</h3>
<div id="map"></div>
#map {
width: 100%;
height: 400px;
background-color: grey;
}
<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<div id="map"></div>
</body>
</html>