<div id="contenedor_publicacion_publicacion" class="agrupacion_contenedor_publicacion">

    @foreach($publicaciones as $publicacion)
        <div>
            <div style="border-radius: 200px 200px 200px 200px;
-moz-border-radius: 200px 200px 200px 200px;
-webkit-border-radius: 200px 200px 200px 200px;
border: 0px solid #000000; background:#e7a61a; width: 100%;height: 350px;">
                <div style="position: relative;left: 100%">
                    @if(true)
                        @foreach($publicacion->documento as $documento)
                            <div>
                                <p>{{$documento->nombre_documento}}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                @foreach($publicacion->documento as $documento)
                    <div style="position:relative; left: 10%;  width: 100%; ">
                        @foreach($documento->imagen as $imagen)
                            <img style="float:left;border-radius: 200px 200px 200px 200px;
-moz-border-radius: 200px 200px 200px 200px;
-webkit-border-radius: 200px 200px 200px 200px;
border: 0px solid #000000;" width="100" height="100" src="../../documentos/imagenes/{{Auth::user()->email}}/{{$documento->tipo_documento}}/{{$imagen->nombre_imagen}}"/>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <p>{{$publicacion->descripcion_publicacion}}</p>
            <p><button>ES MIO</button> <button>SUGERIR</button></p>
        </div>
    @endforeach
</div>

