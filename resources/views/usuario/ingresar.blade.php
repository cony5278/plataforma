<section class="seccion_usuario_sesion">
    <form id="formulario_sesion" method="post" action="/usuario/sesion">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"/>
        <input type="text" name="email">
        <input type="text" name="password">
        <input type="submit" value="enviar">
    </form>
</section>