Publicacion=function(){
    this.configuracion=function(){

    };
    this.publicar=function(){

    };
    this.documento=function()
    {
        var input_registro=document.getElementsByClassName('campo_documentos');//todos los input
        var dato=new FormData();
        dato.append("nombre_documento",input_registro[0].value);
        dato.append("nombre_persona",input_registro[1].value);
        dato.append("apellido_persona",input_registro[2].value);
        dato.append("tipo_documento",input_registro[3].value);
        alert("documentos recogidos "+input_registro[0].value);
        //dato.append("user_id",input_registro[0].value);
        //dato.append("publicacion_id",input_registro[0].value);
        return dato;
    };
    this.imagen=function(){

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
                    alert("entro al numero 2");
                    dato=obj.documento();
                    break;
                //imagenes
                case 3:

                    break;
            }
            var ajax=new Ajax();
            ajax.inicializar();
            ajax.enviar(dato,url);
        }
    };
};