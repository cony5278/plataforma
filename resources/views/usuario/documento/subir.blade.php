<div id="contenedor_publicacion_documentos" class="agrupacion_contenedor_publicacion">
{{--<form method="post" action="parce" enctype="multipart/form-data">--}}
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
        <label>nombre del documento
            <input type="text" placeholder="nombre documento" class="campo_documentos" name="nombre_documento"/>
        </label>
        <label>nombre de la persona
            <input type="text" placeholder="nombre persona" class="campo_documentos"  name="nombre_persona"/>
        </label>
        <label>apellido de la persona
            <input type="text" placeholder="apellido persona" class="campo_documentos"  name="apellido_persona"/>
        </label>
        <label>
            seleccione un tipo de documento
            <select name="tipo_documento" class="campo_documentos" >
                <option value="tarjeta_credito" selected>tarjeta credito</option>
                <option value="tarjeta_debito" >tarjeta debito</option>
                <option value="carnet_estudiantil">carnet estudiantil</option>
                <option value="pasaporte">pasaporte</option>
                <option value="visa">visa</option>
                <option value="tarjeta_profesional">tarjeta profesional</option>
                <option value="licencia_conduccion">licencia de conduccion</option>
                <option value="otro">otro</option>
            </select>
        </label>
        <input type="text" name="descripcion_publicacion" class="campo_documentos" placeholder="descripcion"/>
        <input type="file"id="archivo_campo_documentos" name="archivo[]"multiple="multiple"/>
    <button id="enviar_documento">Enviar</button>
    {{--<input type="submit" value="enviar"/>--}}
    </form>
</div>
