//http://www.mapdevelopers.com/geocode_tool.php
console.log(dbPokemons);
var pokemons = JSON.parse(dbPokemons);
console.log(pokemons);

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 19,
    center: new google.maps.LatLng(-30.865341,-51.800741),
    mapTypeId: 'satellite'
  });

  var iconBase = '../public/imgs/';
    
  //inicializa objeto de janela de info dos marcadores
  var infowindow = new google.maps.InfoWindow();

  //criar os marcadores
  for(i = 0; i < pokemons.length; i++){

    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(pokemons[i].lati,pokemons[i].long),
      icon : iconBase + pokemons[i].img,
      map: map
    });

    var conteudo = pokemons[i].info;
    //adiciona evento de clique aos marcadores
    google.maps.event.addListener(marker,'click', (function(marker,conteudo,infowindow){ 
        return function() {
          infowindow.setContent(conteudo);//setando a string html para a janela do marcador
          infowindow.open(map,marker);
        };
    })(marker,conteudo,infowindow));

  }
}