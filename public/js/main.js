var rectangle, map, infoWindow, LatNE, LatSW, LngNE, LngSW;

var rectangles = [];
var j = 0;

if(findGetParameter().length < 4 || findGetParameter().length > 4){
  LatNE = 44.545752411824964;
  LatSW = 44.57198873488197;
  LngNE = 6.119184478314764;
  LngSW = 6.045584662946112;
}
else
{
  LatNE = parseFloat(findGetParameter()[0]);
  LngNE = parseFloat(findGetParameter()[1]);
  LatSW = parseFloat(findGetParameter()[2]);
  LngSW = parseFloat(findGetParameter()[3]);
}

function findGetParameter() {
  var result = [],
  tmp = [];
  var items = location.search.substr(1).split("&");
  for (var index = 1; index < items.length; index++) {
    tmp = items[index].split("=");
    if(isNaN(tmp[1])){
      alert('Erreur : ' + tmp[0] + ' = ' + tmp[1] + '\n"'+ tmp[1] +'" n\'est pas un nombre.');
    }else{
      result.push(tmp[1]);
    }
  }
  return result;
}

function Xhr(){

  var obj = null;
  try { obj = new ActiveXObject("Microsoft.XMLHTTP");}
  catch(Error) { try { obj = new ActiveXObject("MSXML2.XMLHTTP");}
  catch(Error) { try { obj = new XMLHttpRequest();}
  catch(Error) { alert(' Impossible de créer l\'objet XMLHttpRequest')}
}
}
return  obj;
}


function initMap() {

  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: LatSW, lng: LngNE},
    zoom: 15
  });

  //map.addListener('bounds_changed', showCasc);
  //map.addListener('bounds_changed', getZones);

  var input = /** @type {!HTMLInputElement} */(
    document.getElementById('location-input'));

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
      map: map,
      anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      /*if (!place.geometry) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }*/

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });



  //createRect(LatNE, LatSW, LngNE, LngSW);
}

function createRect(newname = null, newid = null, newbounds = null){
if (newname != null && newid !=null && newbounds!=null){
  var nom = newname;
  var id = newid;
  var bounds = newbounds;
}else{
  var nom = "";
  var id = "";
  var bounds = {
  north: map.getBounds().f.b,
  south: map.getBounds().f.f,
  east: map.getBounds().b.f,
  west: map.getBounds().b.b
};
}


      rectangles[j] = new google.maps.Rectangle({
      nom : nom,
      id : id,
      bounds: bounds,
      editable: true,
      draggable: true,
      saved: false
    });

    var k = j;

    rectangles[j].setMap(map);
    rectangles[j].addListener('bounds_changed', () => showNewRect(k));
    infoWindow = new google.maps.InfoWindow();
    j=j+1;
}



function showNewRect(i) {
  var ne = rectangles[i].getBounds().getNorthEast();
  var sw = rectangles[i].getBounds().getSouthWest();
  var name = rectangles[i].nom;
  console.log(name);

  var contentString = '<form><b>Name : </b><input id="nom" type="text" value="'+name+'"/><input type="button" value="Enregistrer la zone" onclick="saveRect(this,'+i+')" /><br>' +
  'North-east corner: <input type="text" readonly id="latNE" value="'+ne.lat()+'"/>, <input type="text" readonly id="lngNE" value="'+ne.lng()+'"/><br>' +
  'South-west corner: <input type="text" readonly id="latSW" value="'+sw.lat()+'"/>, <input type="text" id="lngSW" readonly value="'+sw.lng()+'"/></form></br><input type="button" value="Supprimer la zone" onclick="delRect('+i+')" />';

  infoWindow.setContent(contentString);
  infoWindow.setPosition(ne);

  infoWindow.open(map);
}

function showCasc(){
  for (i=0; i<cascades.length; i++){
    if (cascades[i].coord.lat<map.getBounds().f.f && cascades[i].coord.lat>map.getBounds().f.b && cascades[i].coord.lng<map.getBounds().b.f && cascades[i].coord.lat>map.getBounds().b.b){
      var marker = new google.maps.Marker({
        position: cascades[i].coord,
        map: map,
        title: cascades[i].nom
      });
    }
  }
}

$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});


function saveRect(obj, num){
    var form = obj.form;
    var latNE = form.elements[2].value;
    var latSW = form.elements[4].value;
    var lngNE = form.elements[3].value;
    var lngSW = form.elements[5].value;
    var name = form.elements[0].value;

    if (rectangles[num].id == ""){
      $.ajax({
       type:'POST',
       url:'admin/savezone',
       data:{name:name, latNE:latNE, latSW:latSW, lngNE:lngNE, lngSW:lngSW},
       success:function(data){
          rectangles[num].name = name;
          rectangles[num].id = data;
       }
    });
  }else{
    var id= rectangles[num].id;
    $.ajax({
     type:'POST',
     url:'admin/updatezone',
     data:{id:id, name:name, latNE:latNE, latSW:latSW, lngNE:lngNE, lngSW:lngSW},
     success:function(data){
        rectangles[num].name = name;
     }
  });
  }
}

function delRect(num){

    if (rectangles[num].id == ""){
      rectangles[num].setMap(null);
  }else{

    var id= rectangles[num].id;
    $.ajax({
     type:'POST',
     url:'admin/deletezone',
     data:{id:id},
     success:function(data){
        rectangles[num].setMap(null);
     }
  });
  }
}

function getZones(){
  var req = new Xhr();                   //  ou req = Xhr();
	req.onreadystatechange = function() {
		if(this.readyState == this.DONE && this.status == 200 ) {
			var reponse = JSON.parse(this.responseText);
      for (i = 0; i < reponse.length; i++){
        var bounds = {
        north: reponse[i].latNE,
        south: reponse[i].latSW,
        east: reponse[i].lngNE,
        west: reponse[i].lngSW
      };
        var name = reponse[i].nom;
        var id = reponse[i].id;
        createRect(name, id, bounds);
      }
		}
	}
	req.open("GET", "admin/getzone");
	req.send(null);
}

function loadZones(xhr){


/*  rectangle = new google.maps.Rectangle({
  bounds: bounds,
  editable: true,
  draggable: true,
  saved: false
});

rectangles.push(rectangle);
console.log(rectangles);

rectangle.setMap(map);
rectangle.addListener('bounds_changed', showNewRect);
infoWindow = new google.maps.InfoWindow();*/
}

window.onload = getZones();
