<section id="module-<?php echo $iterator; ?>" class="flex-container side-padding map hero-bottom-slant">
  <h2 class="flex-100"> <?php echo get_sub_field('module_title'); ?> </h2>

  <div id="map" class="flex-50 flex-col">
  </div>
  <div class="flex-50 flex-col">
    <h5><?php the_sub_field('description'); ?></h5>
    <div class="address-info">
      <?php echo get_sub_field('wysiwyg'); ?>
    </div>
  </div>
</section>

<script>
var myStyle = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
];

var map = new google.maps.Map(document.getElementById('map'), {
   mapTypeControlOptions: {
     mapTypeIds: ['mystyle', google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN]
   },
   zoom: 15,
  center: new google.maps.LatLng(38.903970, -77.045320),
  scrollwheel: false,
  navigationControl: false,
  mapTypeControl: false,
   mapTypeId: 'mystyle'
 });

 map.mapTypes.set('mystyle', new google.maps.StyledMapType(myStyle, { name: 'My Style' }));

 var infowindow = new google.maps.InfoWindow();

 var marker, i;

 var icon = {

   path: "M305.749908,291 C295.395272,291 287,299.39366 287,309.749908 C287,312.650431 287.659176,315.400369 288.836759,317.850601 C288.90253,317.989614 305.749908,351 305.749908,351 L322.459885,318.260902 C323.764029,315.708278 324.499817,312.815226 324.499817,309.749908 C324.499817,299.39366 316.106157,291 305.749908,291 L305.749908,291 Z M305.749908,321 C299.536951,321 294.499817,315.960523 294.499817,309.749908 C294.499817,303.539294 299.536951,298.499817 305.749908,298.499817 C311.960523,298.499817 317,303.539294 317,309.749908 C317,315.960523 311.960523,321 305.749908,321 L305.749908,321 Z",
   fillColor: '#ED8D32',
   strokeColor: '#ED8D32',
   fillOpacity: 1,
   size: new google.maps.Size(38,60),
   origin: new google.maps.Point(287, 291),
     anchor: new google.maps.Point(294,351),
     scale:1,
}
marker = new google.maps.Marker({
  position: new google.maps.LatLng(38.903970, -77.045320),
  icon: icon,
  map: map
});



// google.maps.event.addListener(marker, 'click', (function(marker, i) {
//   return function() {
//     var html = "<div> FARRRTTT </div>" ;
//       infowindow.setContent(html);
//       infowindow.open(map, marker, html);
//       marker.setIcon(activeIcon);
//   }
// })(marker, i));

</script>
