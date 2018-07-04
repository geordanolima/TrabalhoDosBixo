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

    function sorteio(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min)) + min;
  }

   var bicharedo=[];
    var bicho = new Bichos('Charizard', 'img/bichosmapa/001.png', '',78,84,78,-30.865033, -51.801373);
    bicharedo.push(bicho);
    var bicho = new Bichos('Gyarados', 'img/bichosmapa/002.png', '',95,125,79,-30.866258, -51.800719);
    bicharedo.push(bicho);
    var bicho = new Bichos('Rhyhorn', 'img/bichosmapa/003.png', '',80,85,95,-30.865783, -51.799899);
    bicharedo.push(bicho);
   console.log(bicharedo.length);
   var indicesorteado=sorteio(0,bicharedo.length);
   

      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:  -30.865500, lng: -51.800791},
          zoom: 18,
          mapTypeId: 'satellite'
        });
        

        var contentString = '<p><center>'+bicharedo[indicesorteado].nome+'</center></p>'+
        '<ul>'+
            '<li>Vida: '+bicharedo[indicesorteado].vida+'</li>'+
            '<li>Ataque: '+bicharedo[indicesorteado].ataque+'</li>'+
            '<li>Defesa: '+bicharedo[indicesorteado].defesa+'</li>'
        
        +'</ul>';
        bicharedo[indicesorteado].conteudo=contentString;
        var infowindow = new google.maps.InfoWindow({
          content: bicharedo[indicesorteado].conteudo
        });
        
        var marker = new google.maps.Marker({
          position: {lat:  bicharedo[indicesorteado].latitude, lng: bicharedo[indicesorteado].longitude},
          map: map,
          icon:bicharedo[indicesorteado].icone,
          title: 'Hello World!'
        });
        
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

      }
