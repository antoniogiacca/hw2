

async function initMap() {

  const responseJson = await getLatLong();
  const latitude = responseJson.geometry.location.lat;
  const longitude = responseJson.geometry.location.lng;

  const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: latitude, lng: longitude },
      zoom: 12,
  });

  const marker = new google.maps.Marker({
      position: map.getCenter(),
      map: map,
  });

}


async function getLatLong(){
  
  const temp = await fetch("maps/").then(onResponse).then(onJson);
  return temp;
}

function onResponse(response){
  return response.json();
}

function onJson(json){
  return json.results[0];
}

