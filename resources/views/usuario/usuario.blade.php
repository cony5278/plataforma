<ul>
    <li><a href="#" id="menu_configuracion" class="menu_usuario">CONFIGURACION {{Auth::user()->id}}</a></li>
    <li><a href="#" id="menu_publicaciones" class="menu_usuario">PUBLICACIONES</a></li>
    <li><a href="#" id="menu_documentos" class="menu_usuario">DOCUMENTOS</a></li>
    <li><a href="#" id="menu_imagenes" class="menu_usuario" >IMAGENES</a></li>
    <li><a href="{{url('/usuario/cerrar/sesion')}}"> SALIR</a></li>
</ul>
