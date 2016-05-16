<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/usuario/publicacion_menu.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/usuario/publicacion.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/bienvenido.css" media="screen" />
    <script src="../js/index/registro.js" type="text/javascript"></script>
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
                var id=document.getElementById('menu_imagenes');
                if(window.innerWidth>768)
                    if(scroll>=numero){
                        var menu= document.getElementsByClassName('contenedor_buscador');
                        id.innerHTML=scroll;
                        menu[0].style.width="inherit";
                        menu[0].style.position="fixed";
                    }else if(scroll<=numero){
                        id.innerHTML=scroll;
                        var menu= document.getElementsByClassName('contenedor_buscador');
                        menu[0].style.width="100%";
                        menu[0].style.position="relative";
                    }
            }
            var publicacion=new Publicacion();
            publicacion.registrar(2,"enviar_documento","http://localhost:8000/usuario/documento/registrar");
            publicacion.registrar(3,"enviar_imagenes","http://localhost:8000/usuario/imagen/registrar");

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
