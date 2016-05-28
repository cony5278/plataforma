<section class="contenido_registro_usuario">
    <form id="formulario_registro" action="/usuario/registrar" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
        <section class="campo_registro_correo_input">
            <input class="input_registro" type="text" name="email" placeholder="correo electronico" />
        </section>
        <section class="campo_registro_contrasena_input">
            <input class="input_registro" type="text" name="password" placeholder="contraseña" />
        </section>
        <section class="campo_registro_contrasena_input">
            <input class="input_registro" type="text" name="contrasena-confirmar" placeholder="repita su contraseña" />
        </section>
        {{--<button type="button" id="boton_registro">enviar</button>--}}
        <input type="submit" value="enviar">
    </form>
</section>




