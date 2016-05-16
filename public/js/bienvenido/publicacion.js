Publicacion=function(){
    this.dato=new FormData();
    this.configuracion=function(){

    };
    this.publicar=function(){

    };
    this.documento=function()
    {
        var input_registro=document.getElementsByClassName('campo_documentos');//todos los input
        this.dato.append("descripcion_publicacion",input_registro[4].value);
    };
    this.guardar=function(id){
        var obj=this;
        document.getElementById(id).onclick=function() {
            var imagenes = document.getElementById("archivo_campo_documentos").files;//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
            var input_registro = document.getElementsByClassName('campo_documentos');//todos los input
            //var dato=new FormData();
            obj.dato.append("nombre_documento[]", input_registro[0].value);
            obj.dato.append("nombre_persona[]", input_registro[1].value);
            obj.dato.append("apellido_persona[]", input_registro[2].value);
            obj.dato.append("tipo_documento[]", input_registro[3].value);
            for (var i = 0; i < imagenes.length; i++) {
                obj.dato.append('archivo[]', imagenes[i]); //Añadimos cada archivo a el arreglo con un indice direfente
            }
        }
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
                    obj.documento();
                    dato=obj.dato;
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