//fonction qui ajoute position des autre participant 

function GoelocMapInit(jsonFile) {

/*** -------------------------------------------------StreetMap--------------------------------------------- ***/

 
    var tableauMarqueurs = [];

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
    
if(jsonFile!=null){
//transformer le tableau de data en fichier JSON
var sequence = JSON.parse(jsonFile);
  // On initialise la carte
  var carte = L.map('maCarte').setView([sequence[i].latitude+1, sequence[i].longitude+1], 1);
    // On parcourt les différentes villes
    for(i in sequence){
    // On crée le marqueur et on lui attribue une popup
    var marqueur = L.marker([sequence[i].latitude, sequence[i].longitude], {icon: icone}); //.addTo(carte); Inutile lors de l'utilisation des clusters
    marqueur.bindPopup("<p>"+sequence[i].nom+"</p>");
    marqueurs.addLayer(marqueur); // On ajoute le marqueur au groupe

    // On ajoute le marqueur au tableau
    tableauMarqueurs.push(marqueur);
    }
  }
  
    // On crée le marqueur et on lui attribue une popup
    var marqueur = L.marker([lat,long], {icon: icone}); //.addTo(carte); Inutile lors de l'utilisation des clusters
    marqueur.bindPopup("<p>"+"Votre Position"+"</p>");
    marqueurs.addLayer(marqueur); // On ajoute le marqueur au groupe

    // On ajoute le marqueur au tableau
    tableauMarqueurs.push(marqueur);
    
    //-------------------------------------------
    // On regroupe les marqueurs dans un groupe Leaflet
    var groupe = new L.featureGroup(tableauMarqueurs);

    // On adapte le zoom au groupe
    carte.fitBounds(groupe.getBounds().pad(0.5));

    carte.addLayer(marqueurs);
/*** -------------------------------------------------StreetMap--------------------------------------------- ***/


document.addEventListener("DOMContentLoaded",(ev) => {
  var jsonfille = document.getElementById("container").innerHTML;
  console.log("envoi de "+jsonfille); 
  //jsonfille = JSON.parse(jsonfille);
  //console.log(jsonfille); 
  GoelocMapInit(jsonfille);

 // document.getElementById("container").innerHTML = "";
});
}