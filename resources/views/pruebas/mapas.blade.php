<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
        #map {
            height: 300px;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACJapLIVhm-uVWitwICh24232jYdkP1SQ&signed_in=true"></script>

    <script>

        initMap();

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {
                    lat: -34.653015,
                    lng: -58.674850
                }
            });
            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;

            document.getElementById('submit').addEventListener('click', function() {
                geocodeLatLng(geocoder, map, infowindow);
            });
        }

        function geocodeLatLng(geocoder, map, infowindow) {
            var input = document.getElementById('latlng').value;
            var latlngStr = input.split(',', 2);
            var latlng = {
                lat: parseFloat(latlngStr[0]),
                lng: parseFloat(latlngStr[1])
            };
            geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        map.setZoom(11);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        infowindow.setContent(results[1].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No hay resultados');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }
//        window.onload=function(){
//            initMap();
//        }
    </script>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
            <input id="latlng" type="text" value="-34.653015, -58.674850">
            <input id="submit" type="button" value="Obtenr Nombre">
            <div id="map"></div>

        </div>
    </div>
</div>
</body>
</html>