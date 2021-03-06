/**
 * Created by cony on 7/05/16.
 */

/**
 * clase ajax
 * @constructor
 */
Ajax=function(){
    this.peticion_http=null;

    this.inicializar=function(){

        if(window.XMLHttpRequest) {
            this.peticion_http = new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            this.peticion_http  = new ActiveXObject("Microsoft.XMLHTTP");
        }
    };
    this.enviar=function  (dato,url){
        //url='http://localhost:8000/hola'
        this.peticion_http.open('POST',url, true);
        var valor=document.getElementById('token').value;
        this.peticion_http.setRequestHeader("X-CSRF-TOKEN",valor);
        //this.peticion_http.setRequestHeader('Content-Type', 'application/json;charset=UTF-8')
        this.peticion_http.send(dato);
    };
    this.muestraContenido= function(contenedor) {
        var obj=this;
        this.peticion_http.onreadystatechange=function(){
            if(obj.peticion_http.readyState == 4) {
                if(obj.peticion_http.status == 200) {
                    contenedor.placeholder=obj.peticion_http.responseText;
                }
            }
        }
    };
};


SesionUsuario= function () {

    this.sesion=function(){
        document.getElementById('iniciar_sesion').onclick=function() {

            var seccion_registro=document.getElementsByClassName('contenido_registro_usuario');

            var contenido_sesion = document.getElementsByClassName('seccion_usuario_sesion');
            contenido_sesion[0].style.display = "flex";


        }
    };
};
/**
 * clase registro de usuario
 * @constructor
 */
RegistroUsuario=function(){

    this.registrar=function()
    {

        document.getElementsByClassName('usuario_registrarce')[0].onclick=function(){
            var contenido_registro = document.getElementsByClassName('contenido_registro_usuario');
            contenido_registro[0].style.display = "flex";

        }
    };
    this.enviar_registro=function(){

        document.getElementById('boton_registro').onclick=function(){
            document.getElementById('formulario_registro').submit();
            //var input_registro=document.getElementsByClassName('input_registro');//todos los input
            //
            //var usuario=new Usuario(input_registro[0].value,input_registro[1].value);
            //var dato=new FormData();
            //dato.append("correo",usuario.getCorreo());
            //dato.append("contrasena",usuario.getContrasena());
            //var ajax=new Ajax();
            //ajax.inicializar();
            //ajax.enviar(dato);
        }
    };
};

/**
 * clase usuario
 * @param correo
 * @param contrasena
 * @constructor
 */
Usuario=function(correo,contrasena){
    this.correo=correo;
    this.contrasena=contrasena;
    this.getCorreo=function(){
        return this.correo;
    };
    this.getContrasena=function(){
        return this.contrasena;
    };

    this.setCorreo=function(correo){
        this.correo=correo;
    };
    this.setContrasena=function(contrasena){
        this.contrasena=contrasena;
    };
};


