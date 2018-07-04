    class Bichos{
        constructor(name, icon, content, hp, atk, def, lat, long){
            this.nome=name;
            this.icone=icon;
            this.conteudo=content;
            this.vida=hp;
            this.ataque=atk;
            this.defesa=def;
            this.latitude=lat;
            this.longitude=long;
            

        }
        
    }
   var bicho = new Bichos('charizard', 'img/bichosmapa/006.png', '',10,5,6,-30.865500, -51.800791);
   console.log(bicho.icone);

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:  -30.865500, lng: -51.800791},
          zoom: 18,
          mapTypeId: 'satellite'
        });
        
        var contentString = '<p>'+bicho.nome+'</p>';
        bicho.conteudo=contentString;
        var infowindow = new google.maps.InfoWindow({
          content: bicho.conteudo
        });
        
        var marker = new google.maps.Marker({
          position: {lat:  bicho.latitude, lng: bicho.longitude},
          map: map,
          icon:bicho.icone,
          title: 'Hello World!'
        });
        
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

      }
