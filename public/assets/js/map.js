$(document).ready(function() {
    $('#maparea').locationpicker({
      inputBinding: {
        latitudeInput: $('#us2-lat'),
        longitudeInput: $('#us2-lon'),
        locationNameInput: $('#us2-address')
      },
      enableAutocomplete: true,
      onchanged: function(currentLocation) {
          var placeType = ["atm", "pharmacy"];
          var sep = ',';
          var request = [],resultset,
            lat = currentLocation.latitude,
            lan = currentLocation.longitude;
          for (var i = 0; i < placeType.length; i++) {
            request = {
              location: new google.maps.LatLng(lat, lan),
              types: [placeType[i]],
              rankBy: google.maps.places.RankBy.DISTANCE
  
            };
            var container = document.getElementById(placeType[i]);
            //console.log(container);
            var service = new google.maps.places.PlacesService(container);
            service.nearbySearch(request, callback);
            //console.log(placeType[i]);
            function callback(results, status) {
              if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var j = 0; j < 3; j++) {      
                  resultset += results[j].name + sep + results[j].vicinity + '.<br>'
                  
                }
  
              }
            }
  
          }
        } //end onchange
  
      /*
      onchanged: function(currentLocation) {
          var placeType = ["atm", "pharmacy"];
          var sep = ',';
          var request = [],
            lat = currentLocation.latitude,
            lan = currentLocation.longitude;
          for (var i = 0; i < placeType.length; i++) {
            request = {
              location: new google.maps.LatLng(lat, lan),
              types: [placeType[i]],
              rankBy: google.maps.places.RankBy.DISTANCE
            };
            var container = document.getElementById("'" + placeType[i] + "'");
            var service = new google.maps.places.PlacesService(container);
            service.nearbySearch(request, callback);
  
            function callback(results, status) {
              if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var j = 0; j < 3; j++) {
                  var input = document.getElementById("'" + placeType[i] + "'");
  
                  var resultset += results[j].name + sep + results[j].vicinity + '.';
                  console.log(resultset);
  
                }
  
              }
            }
          }
        } //end of onchange function
  */
    });
  });