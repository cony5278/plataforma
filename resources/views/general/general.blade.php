@extends('index')
{{--index--}}
@section('cabecera')
    @include('cabeza.cabeceraIndex')
@stop


@section('registroUsuario')
    @include('usuario.registro')
@stop

@section('iniciar_sesion')
    @include('usuario.ingresar')
@stop

@section('buscador')
    @include('buscador.buscador')
@stop

{{--fin--}}

{{--publicacion--}}
@section('cabecera_publicaciones')
    @include('cabeza.cabeceraPublicacion')
@stop
{{--fin--}}

@section('cerrar')
    @include('cabeza.sacar')
@stop

