<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="../css/bienvenido.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/usuario/publicacion_menu.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/usuario/publicacion.css" media="screen" />
    <script src="../js/bienvenido/publicacion.js" type="text/javascript"></script>
    <script src="../js/bienvenido/usuario.js" type="text/javascript"></script>
    <script>
        window.onload=function() {
            var publicar=document.getElementsByClassName('contenedor_publicar');
            var numero=publicar[0].offsetTop;
            var ventana=new ContenedorVentana();
            ventana.desaparecer('menu_usuario',"","");
            window.onscroll = function (){
                var scroll = document.documentElement.scrollTop || document.body.scrollTop;
                if(scroll>=numero){
                    var menu= document.getElementsByClassName('contenedor_buscador');
                    menu[0].style.width="inherit";
                    menu[0].style.position="fixed";
                }else if(scroll==0){
                    var menu= document.getElementsByClassName('contenedor_buscador');
                    menu[0].style.width="100%";
                    menu[0].style.position="relative";
                }
            }
        }
    </script>
</head>
<body>
<div class="contenedor">
    <div class="contenedor_usuario">
        <h1> USUARIO </h1>
        @yield('usuario')
    </div>
    <div class="contenedor_publicacion">
        <div class="contenedor_buscador">
            @yield('contenedor_buscador_inicio_notificaciones')
        </div>
        <div class="publicacin_usuario">
            @yield('publicacion')
        </div>
    </div>
</div>
</body>
</html>
