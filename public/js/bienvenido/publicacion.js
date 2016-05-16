Publicacion=function(){
    this.configuracion=function(){

    };
    this.publicar=function(){

    };
    this.documento=function()
    {
        var imagenes = document.getElementById("archivo_campo_documentos").files;//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
        //var archivos = document.getElementById("archivos");//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
        //var archivo = archivos.files; //Obtenemos los archivos seleccionados en el imput
        var input_registro=document.getElementsByClassName('campo_documentos');//todos los input
        var dato=new FormData();
        dato.append("nombre_documento",input_registro[0].value);
        dato.append("nombre_persona",input_registro[1].value);
        dato.append("apellido_persona",input_registro[2].value);
        dato.append("tipo_documento",input_registro[3].value);
        dato.append("descripcion_publicacion",input_registro[4].value);

        for(var i=0; i<imagenes.length; i++){
            dato.append('archivo[]',imagenes[i]); //Añadimos cada archivo a el arreglo con un indice direfente
        }
        return dato;
    };
    this.imagen=function(){
        var imagenes=document.getElementById('campo_archivo_imagenes').files;
        var dato=new FormData();
        for (var i=0;i<imagenes.length;i++)
            dato.append('archivo[]',imagenes[i]);
        return dato;
    };
    this.registrar=function(opcion,id_enviar,url){
        var obj=this;
        document.getElementById(id_enviar).onclick=function(){
            var dato=null;
            switch (opcion) {
                //configuracion
                case 0:

                    break;
                //publicaciones
                case 1:

                    break;
                //documentos
                case 2:
                    //alert("entro al numero 2");
                    dato=obj.documento();
                    break;
                //imagenes
                case 3:
                    dato=obj.imagen();
                    break;
            }
            var ajax=new Ajax();
            ajax.inicializar();
            ajax.enviar(dato,url);
        }
    };
};