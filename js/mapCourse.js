  // Pour géolocaliser on utilise l'objet geolocation
// Vérifier que la geolocation soit disponible
var lat;
var long;
villes ={
  "Votre Localisation": { "lat": 0, "lon": 0 }
  };



if ('geolocation' in navigator) {
  
    // Obtenir la position avec getCurrentPosition() ou watchPosition()
    // (success, error (optionnel), options (optionnel))
    
    navigator.geolocation.getCurrentPosition((position) => {
      console.log(position.coords.latitude);
      console.log(position.coords.longitude);
    lat = position.coords.latitude ;
    long = position.coords.longitude ;
    

        //envoi de la position en metholde poste pour la page tst qui met les coordonnais en bd   
      $x= position.coords.latitude,
      $y= position.coords.longitude


      var url = 'http://localhost/PWA/php/tst.php';
      var formData = new FormData();
         
          formData.append('x', $x);
          formData.append('y', $y);
  
  fetch(url, { method: 'POST', body: formData })
    .then(function (response) {
      return response.text();
    })
    .then(function (body) {
      console.log(body);
    });
    
/*** -------------------------------------------------StreetMap--------------------------------------------- ***/
  villes = {
  "Votre Localisation": { "lat": lat, "lon": long }
  };
    var tableauMarqueurs = [];

    // On initialise la carte
    var carte = L.map('maCarte').setView([lat+1, long+1], 1);

    // On charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    // Il est toujours bien de laisser le lien vers la source des données
    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 1,
    maxZoom: 20
    }).addTo(carte);

    var marqueurs = L.markerClusterGroup();

    // On personnalise le marqueur
    var icone = L.icon({
    iconUrl: "http://localhost/PWA/img/marqueur.svg",
    iconSize: [20, 20],
    iconAnchor: [10, 20],
    popupAnchor: [0, -50]
    })

    // On parcourt les différentes villes
    for(ville in villes){
    // On crée le marqueur et on lui attribue une popup
    var marqueur = L.marker([villes[ville].lat, villes[ville].lon], {icon: icone}); //.addTo(carte); Inutile lors de l'utilisation des clusters
    marqueur.bindPopup("<p>"+ville+"</p>");
    marqueurs.addLayer(marqueur); // On ajoute le marqueur au groupe

    // On ajoute le marqueur au tableau
    tableauMarqueurs.push(marqueur);
    }
    // On regroupe les marqueurs dans un groupe Leaflet
    var groupe = new L.featureGroup(tableauMarqueurs);

    // On adapte le zoom au groupe
    carte.fitBounds(groupe.getBounds().pad(0.5));

    carte.addLayer(marqueurs);
/*** -------------------------------------------------StreetMap--------------------------------------------- ***/
    //affichage d'une alerte sur la fenetre du navigateur
    //window.alert(position.coords.latitude+'   '+position.coords.longitude);
    }, error, options);
    
    function error() {
      alert('Aucune position disponible.');
    }
    
    var options = {
      enableHighAccuracy: true,  // false par defaut
      maximumAge        : 30000, // derniere position en cache en millisecondes qu'on peut accepter, 0 par defaut
      timeout           : 27000  // duree max en millisecondes pour geolocaliser, infinity par defaut
    }
    
    /*
    let watch = navigator.geolocation.watchPosition() ...
    navigator.geolocation.clearWatch(watch)
    */  
  }
  else 
  {
    alert('Le navigateur ne supporte pas la geolocalisation');
  }
//cette ligne sert a attendre le chargement de la page html avent de lancé la ligne
//window.addEventListener("load",demarrage);


