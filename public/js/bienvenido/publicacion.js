Publicacion=function(){
    this.dato=new FormData();
    this.contador=0;
    this.configuracion=function(){

    };
    this.publicar=function(){

    };
    this.documento=function()
    {
        var input_registro=document.getElementsByClassName('campo_documentos');//todos los input
        this.dato.append("titulo_documento", input_registro[3].value);
        this.dato.append("descripcion_publicacion",input_registro[4].value);
    };
    this.guardar=function(id){

        var obj=this;
        document.getElementById(id).onclick=function() {
            obj.contador++;
            var imagenes = document.getElementById("archivo_campo_documentos").files;//Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
            var input_registro = document.getElementsByClassName('campo_documentos');//todos los input
            obj.dato.append("nombre_persona[]", input_registro[0].value);
            obj.dato.append("apellido_persona[]", input_registro[1].value);
            obj.dato.append("tipo_documento[]", input_registro[2].value);
            var data = new FormData();
            for (var i = 0; i < imagenes.length; i++) {
                obj.dato.append('archivo[]', imagenes[i], obj.contador + "_" + imagenes[i].name);
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
            //obj.dato=null;//borrar los campors de un FormData
            obj.contador=0;//contador a 0;
            var ajax=new Ajax();
            ajax.inicializar();
            ajax.enviar(dato,url);

        }
    };
};

ObjetoJson=function(){
    this.nombre_documento=null;
    this.nombre_persona=null;
    this.apellido_persona=null;
    this.tipo_documento=null;
    this.archivo=null;
};