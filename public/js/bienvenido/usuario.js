/**
 * Created by cony on 13/05/16.
 */
ContenedorVentana=function(){
    this.desaparecer=function(clase,contenedor_aparecer,contenedor_desaparecer){
        var etiqueta_a=document.getElementsByClassName(clase);
        var obj=this;
        var aparecer_desaparecer_scroll=document.getElementsByTagName("html")[0];
        for (var i=0;i<etiqueta_a.length;i++){
            etiqueta_a[i].onclick=function(){
                switch(this.id){
                    case "menu_configuracion":
                        aparecer_desaparecer_scroll.style.overflow = "hidden";
                        obj.ocultar_ventanas(etiqueta_a.length,0);
                        break;
                    case "menu_publicaciones":
                        aparecer_desaparecer_scroll.style.overflow = "auto";
                        obj.ocultar_ventanas(etiqueta_a.length,1);
                        break;
                    case "menu_documentos":
                        aparecer_desaparecer_scroll.style.overflow = "auto";
                        obj.ocultar_ventanas(etiqueta_a.length,2);
                        break;
                    case "menu_imagenes":
                        aparecer_desaparecer_scroll.style.overflow = "auto";
                        obj.ocultar_ventanas(etiqueta_a.length,3);
                        break;
                }
            }
        }
    };
    this.ocultar_ventanas=function(tamano,i){
        var clase=document.getElementsByClassName('agrupacion_contenedor_publicacion');
        for(var j=0;j<4;j++)
            clase[j].style.display = "none";
        clase[i].style.display = "block";
    };

    this.crearEvento=function(elemento, evento, funcion) {
        if (elemento.addEventListener) {
            elemento.addEventListener(evento, funcion, false);
        } else {
            elemento.attachEvent("on" + evento, funcion);
        }
    }
    this.configuracion= function (id) {
        var boton =document.getElementById(id);
        var aparecer_desaparecer_scroll=document.getElementsByTagName("html")[0];
        var obj=this;
        boton.onclick=function(){
            aparecer_desaparecer_scroll.style.overflow = "auto";
            obj.ocultar_ventanas(4,1);
        }
    }
}
/**
 * configuracion de usuario eventos
 * @constructor
 */
ConfiguracionUsuario= function (clase_guardar,clase_borrar,clase_campos_usuario) {
    this.boton_guardar_Campos=document.getElementsByClassName(clase_guardar);
    this.boton_borrar_Campos=document.getElementsByClassName(clase_borrar);
    this.campos_usuario=document.getElementsByClassName(clase_campos_usuario);
    this.dato=new FormData();
    this.ajax=new Ajax();
    this.campos_input_guardar=function(url){
        var obj=this;
        for (var i=0;i<this.boton_guardar_Campos.length;i++){
            this.boton_guardar_Campos[i].onclick= function () {
                switch (this.id){
                    case "guardar_nombre":

                        obj.dato.append('name',obj.campos_usuario[0].value);
                        obj.ajax.inicializar();
                        obj.ajax.enviar(obj.dato,url);
                        obj.ajax.muestraContenido(obj.campos_usuario[0]);

                        break;
                    case "guardar_apellido":
                        obj.dato.append('last_namee',obj.campos_usuario[1].value);
                        obj.ajax.inicializar();
                        obj.ajax.enviar(obj.dato,url);
                        obj.ajax.muestraContenido(obj.campos_usuario[1]);
                        break;
                    case "guardar_nombre_usuario":
                        obj.dato.append('nombre_usuario',obj.campos_usuario[2].value);
                        obj.ajax.inicializar();
                        obj.ajax.enviar(obj.dato,url);
                        obj.ajax.muestraContenido(obj.campos_usuario[2]);
                        break;
                    case "guardar_correo":
                        obj.dato.append('email',obj.campos_usuario[3].value);
                        obj.ajax.inicializar();
                        obj.ajax.enviar(obj.dato,url);
                        obj.ajax.muestraContenido(obj.campos_usuario[3]);
                        break;

                    case "actulizar_coordenadas":
                        //alert("click");
                        navigator.geolocation.getCurrentPosition(function(position){

                            //obj.ajax.muestraContenido(obj.campos_usuario[3]);
                            var localizacion = {lat:position.coords.latitude, lng: position.coords.longitude};
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 18,
                                center: localizacion
                            });
                            var infowindow = new google.maps.InfoWindow();

                            var marker = new google.maps.Marker({
                                position: localizacion,
                                map: map,
                                title: 'MAPA'
                            });
                            var geocoder = new google.maps.Geocoder;
                            var latlng = {lat: position.coords.latitude, lng:position.coords.longitude};

                            geocoder.geocode({'location': latlng}, function(results, status) {
                                if (status === google.maps.GeocoderStatus.OK) {
                                    if (results[1]) {
                                        map.setZoom(11);
                                        var marker = new google.maps.Marker({
                                            position: latlng,
                                            map: map
                                        });
//                        alert(results[3].formatted_address);
                                        var nombre_lugar=results[0].formatted_address;
                                        obj.dato.append('latitud',position.coords.latitude);
                                        obj.dato.append('longitud',position.coords.longitude);
                                        obj.dato.append('nombre_lugar',nombre_lugar.split(",")[1]);
                                        obj.ajax.inicializar();
                                        obj.ajax.enviar(obj.dato,url);
                                        infowindow.setContent(results[0].formatted_address);
                                        infowindow.open(map, marker);
                                    } else {
                                        window.alert('No results found');
                                    }
                                } else {
                                    window.alert('Geocoder failed due to: ' + status);
                                }
                            });

                        });
                        break;
                }
            }
        }

    };

    this.campos_input_borrar=function(){
        var obj=this;
        for (var i=0;i<this.boton_guardar_Campos.length;i++){
            this.boton_borrar_Campos[i].onclick= function () {
                switch (this.id){
                    case "borrar_nombre":
                        obj.campos_usuario[0].value="";
                        break;
                    case "borrar_apellido":
                        obj.campos_usuario[1].value="";
                        break;
                    case "borrar_nombre_usuario":
                        obj.campos_usuario[2].value="";
                        break;
                    case "borrar_correo":
                        obj.campos_usuario[3].value="";
                        break;
                }
            }
        }
    };
}
