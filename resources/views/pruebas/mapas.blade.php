<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script>
        function iniciar(position){
//            var mensaje=null;
            var latlng = {lat: position.coords.latitude, lng:position.coords.longitude};
            var ciudad={"nombre_ciudad":"","latitud":position.coords.latitude,"longitud":position.coords.longitude};

            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({'location': latlng}, function(results, status) {
               ciudad.nombre_ciudad=results[0].formatted_address.split(",")[2];
            });
        }
        navigator.geolocation.getCurrentPosition(iniciar);
    </script>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">
          hola mundo
        </div>
    </div>
</div>
</body>
</html>