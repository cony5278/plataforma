<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="../css/index.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/registro.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/sesion.css" media="screen" />

    <script src="../js/index/registro.js" type="text/javascript"></script>
    <title></title>
    <script>

        window.onload=function(){

            var sesion=new SesionUsuario();
            sesion.sesion();

            var registro=new RegistroUsuario();
            registro.registrar();
            registro.enviar_registro();

        }
    </script>


</head>
<body>

<div class="container">
    <header>
        @yield('cabecera')

    </header>
    <div class="content">
        @yield('registroUsuario')
        @yield('iniciar_sesion')
        @yield('buscador')
    </div>
    <footer>

        <p>pie de pagina </p>
        <!-- end .footer --></footer>
    <!-- end .container --></div>

</body>
</html>
