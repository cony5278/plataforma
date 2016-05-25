<section class="contenido_buscador">
    <section class="contenido_content">
        <article class="buscador_principal">
            <form action="buscador/recibir" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
                <div class="form_buscador">
                    <input type="text" name="buscador_general"/>
                    <button class="yt-uix-button yt-uix-button-size-default yt-uix-button-default search-btn-component search-button" type="submit" onclick="if (document.getElementById('masthead-search-term').value == '') return false; document.getElementById('masthead-search').submit(); return false;;return true;" dir="ltr" tabindex="2" id="search-btn"><span class="yt-uix-button-content">Buscar</span></button>
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