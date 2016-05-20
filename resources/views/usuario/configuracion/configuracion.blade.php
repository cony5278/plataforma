<div  id="contenedor_publicacion_configuracion" class="agrupacion_contenedor_publicacion">
    <div>
        <a id="configuracion_atras">atras</a>
    </div>
    <div>
        <div style="margin: 0 auto; width: 50%;height: 50%;background:#FFFFFF;">
            <div style="display: block;">
                <div style="display: block;" >
                    <input class="campos_usuarios" placeholder="{{Auth::user()->name}}" />
                    <button id="borrar_nombre" class="boton_borrar_informacion_campos">borrar</button>
                    <button id="guardar_nombre" class="boton_guardar_Campos">guardar</button>
                </div>
                <div style="display: block;">
                    <input class="campos_usuarios"  placeholder="{{Auth::user()->last_name}}" />
                    <button id="borrar_apellido" class="boton_borrar_informacion_campos">borrar</button>
                    <button id="guardar_apellido" class="boton_guardar_Campos">guardar</button>
                </div>
                <div style="display: block;">
                    <input class="campos_usuarios"  placeholder="{{Auth::user()->nombre_usuario}}"/>
                    <button id="borrar_nombre_usuario" class="boton_borrar_informacion_campos">borrar</button>
                    <button id="guardar_nombre_usuario" class="boton_guardar_Campos">guardar</button>
                </div>
                <div style="display: block;">
                    <input class="campos_usuarios"  placeholder="{{Auth::user()->email}}">
                    <button id="borrar_correo" class="boton_borrar_informacion_campos">borrar</button>
                    <button id="guardar_correo" class="boton_guardar_Campos">guardar</button>
                </div>
                <div style="display: block;">
                    <a>actualizar tu ubicacion</a><button id="actulizar_coordenadas" class="boton_guardar_Campos">actualizar ubicacion</button>
                </div>
                <div id="map" style="width: 300px;height: 300px;">

                </div>
            </div>

        </div>

    </div>
</div>