<section class="contenido_buscador">
    <section class="contenido_content">
        <article class="buscador_principal">
            <form action="buscador/recibir" name="buscador-filtros" id="buscador-filtros-id" method="get">
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
                <div class="form_buscador" style="position:relative;">
                    <input type="text"id="input-buscador-general-id" name="buscador_general"/>
                    <input type="submit" value ="Buscar" id="btn-buscador-filtros"/>
                    <div id="div-aparecer-busquedas" style="display: none;position:absolute;top:100%;width:100%;height: 100px; background: #00aeef;">

                    </div>

                </div>
                <div>
                    <select name="ubicacion">
                        <option value="seleccione_ubicacion" selected>Seleccion Municipio</option>
                        @foreach($municipios as $municipio)
                            <option value="{{$municipio->id}}"> {{ucwords(strtolower($municipio->nombre_lugar))}}</option>
                        @endforeach
                    </select>
                    <select name="tipo_documento">
                        <option value="seleccione_tipo_documento" selected>Seleccion un Documento</option>
                        <option value="tarjeta_credito" >Tarjeta credito</option>
                        <option value="tarjeta_debito" >Tarjeta debito</option>
                        <option value="carnet_estudiantil">Carnet estudiantil</option>
                        <option value="pasaporte">Pasaporte</option>
                        <option value="visa">Visa</option>
                        <option value="tarjeta_profesional">Tarjeta profesional</option>
                        <option value="licencia_conduccion">Licencia de conduccion</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
            </form>
        </article>
    </section>
</section>

