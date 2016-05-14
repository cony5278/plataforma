/**
 * Created by cony on 13/05/16.
 */
ContenedorVentana=function(){
    this.desaparecer=function(clase,contenedor_aparecer,contenedor_desaparecer){
        var etiqueta_a=document.getElementsByClassName(clase);
        var obj=this;
        for (var i=0;i<etiqueta_a.length;i++){
            etiqueta_a[i].onclick=function(contador){

                switch(this.id){
                    case "menu_configuracion":
                        obj.ocultar_ventanas(etiqueta_a.length,0);
                        break;
                    case "menu_publicaciones":
                        obj.ocultar_ventanas(etiqueta_a.length,1);
                        break;
                    case "menu_documentos":
                        obj.ocultar_ventanas(etiqueta_a.length,2);
                        break;
                    case "menu_imagenes":
                        obj.ocultar_ventanas(etiqueta_a.length,3);
                        break;
                }
            }
        }
    };
    this.ocultar_ventanas=function(tamano,i){
        var clase=document.getElementsByClassName('agrupacion_contenedor_publicacion');
        for(var j=0;j<4;j++) {
                clase[j].style.display = "none";
        }
        clase[i].style.display = "block";

    };

    this. crearEvento=function(elemento, evento, funcion) {
        if (elemento.addEventListener) {
            elemento.addEventListener(evento, funcion, false);
        } else {
            elemento.attachEvent("on" + evento, funcion);
        }
    }
}