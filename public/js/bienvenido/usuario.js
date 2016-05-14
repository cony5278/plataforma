/**
 * Created by cony on 13/05/16.
 */
ContenedorVentana=function(){

    this.desaparecer=function(clase,contenedor_aparecer,contenedor_desaparecer){
        var etiqueta_a=document.getElementsByClassName(clase);
        //var etiqueta_section_aparecer=document.getElementsByName(contenedor_aparecer);
        //var etiqueta_section_desaparecer=document.getElementsByName(contenedor_aparecer);

        for (var i=0;i<etiqueta_a.length;i++){
            etiqueta_a[i].onclick=function(){
                alert("click "+this.innerHTML);
            }
        }
    };
    this. crearEvento=function(elemento, evento, funcion) {
        if (elemento.addEventListener) {
            elemento.addEventListener(evento, funcion, false);
        } else {
            elemento.attachEvent("on" + evento, funcion);
        }
    }
}