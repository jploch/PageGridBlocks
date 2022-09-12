<?php

namespace ProcessWire; ?>

<section id="map_<?= $page->id ?>" class="map-container">
</section>


<!--template scripts-->


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script>
  if (typeof L !== 'undefined') {

    if (map_<?= $page->id ?> != undefined) {
      map_<?= $page->id ?>.remove();
    }

    var map_<?= $page->id ?> = L.map('map_<?= $page->id ?>', {
      center: [<?= $page->pg_map->lat ?>, <?= $page->pg_map->lng ?>],
      zoom: <?= $page->pg_map->zoom ?>,
      dragging: false,
      tap: false,
      scrollWheelZoom: false
    });


    var myIcon = L.divIcon({
      className: 'marker'
    });
    L.marker([<?= $page->pg_map->lat ?>, <?= $page->pg_map->lng ?>], {
      icon: myIcon
    }).addTo(map_<?= $page->id ?>);

    // more styles:
    //https://leaflet-extras.github.io/leaflet-providers/preview/
    L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.{ext}', {
      attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      subdomains: 'abcd',
      minZoom: 0,
      maxZoom: 20,
      ext: 'png'
    }).addTo(map_<?= $page->id ?>);

  }
</script>