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
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="../js/jquery-1.12.4.min.js" type="text/javascript"></script>

    <script>
        window.onload=function() {
            var publicar=document.getElementsByClassName('contenedor_publicar');
            var numero=publicar[0].offsetTop;
            var configuracionUsuario=new ConfiguracionUsuario("boton_guardar_Campos","boton_borrar_informacion_campos","campos_usuarios");

            configuracionUsuario.campos_input_guardar("http://localhost:8000/usuario/configuracion");
//            configuracionUsuario.campos_input_borrar();
            var ventana=new ContenedorVentana();
            ventana.desaparecer('menu_usuario',"","");
            ventana.configuracion('configuracion_atras');
            var menu = document.getElementsByClassName('contenedor_buscador');
            window.onscroll = function () {
                var scroll = document.documentElement.scrollTop || document.body.scrollTop;
                var id = document.getElementById('menu_imagenes');
                if (window.innerWidth >= 768) {
                    if (scroll >= numero) {
                        id.innerHTML = scroll;
                        menu[0].style.width = "inherit";
                        menu[0].style.position = "fixed";
                    } else if (scroll <= numero) {
                        id.innerHTML = scroll;
                        menu[0].style.width = "100%";
                        menu[0].style.position = "relative";
                    }
                }
            }
            window.onresize = function(event) {
                if (window.innerWidth < 768) {
                    menu[0].style.width = "100%";
                    menu[0].style.position = "relative";
                }else{
                    menu[0].style.width = "inherit";
                    menu[0].style.position = "fixed";
                }
            }
            var publicacion=new Publicacion();
            publicacion.guardar("guardar_documento");
            publicacion.registrar(2,"enviar_documento","http://localhost:8000/usuario/documento/registrar");
            publicacion.registrar(3,"enviar_imagenes","http://localhost:8000/usuario/imagen/registrar");


            /*
             ajax buscar
             */
//            pruebass
//            buscador_form
//            tipo_documento
//            buscador_general
//            ubicacion

            $('#input-buscador-general-id').keypress(function(event){


                var direccion = $('#buscador-filtros-id').attr("action");
                var form = document.getElementById('buscador-filtros-id');
                var valor = document.getElementById('token').value;

                $.ajax({
                    url: direccion,
                    headers: {"X-CSRF-TOKEN": valor},
                    data: {
                        'buscador_general': form.buscador_general.value,
                        'ubicacion': form.ubicacion.value,
                        'tipo_documento': form.tipo_documento.value
                    },
                    type: 'GET',
                    dataType: 'json',
                    success: function (datos) {
                        console.log(datos);
                        var div_general=$('.form_buscador');
                        $('.form_buscador div').remove();
                        var div = $('<div/>');
                        div.css({'zIndex':'3','position':'absolute','top':'100%','background': '#00aeef'});


                        var contador = 0;
                        var publicacion_id;
                        var div_adentro;
                        var div_img ;
                        var p_nombre;
                        var a;

                        if(datos.length>1) {
                            var i=0;
                            for (i=0;i<datos.length;i++) {
                                contador++;
                                if (contador == 1) {//
                                    var div_adentro = $('<div/>');
                                    div_adentro.css({'width': '100%', 'background': '#A94040'});
                                    div_img = $('<img/>');
                                    p_nombre = $('<p/>');
                                    div_adentro.append(div_img);
                                    div_adentro.append(p_nombre);
                                    publicacion_id = datos[i].publicacion_id;
                                }
                                if (publicacion_id == datos[i].publicacion_id) {

                                    a = $('<a/>');
                                    a.css({'width': '100%', height: 'inherit'})
                                    a.html(datos[i].publicacion_id);
                                    div_adentro.append(a);
                                    if(i==datos.length-1)
                                        div.append(div_adentro);

                                } else {

                                    div.append(div_adentro);
                                    contador = 0;
                                    i--;
                                }
                            }
                        }else
                            div.append(div_adentro);
                        i=0;
                        contador=0;
                        div_general.append(div);


                    },
                    error: function (e) {
//                        console.log(e.responseText);
                    }
                });



            });


        }

    </script>
</head>
<body>

@yield('configuracion')

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
