@extends('bienvenido')
{{--publicaciones--}}
@section('usuario')

    @include('usuario.usuario')
@stop

@section('publicacion')
    @include('publicaciones.publicacion')
@stop
@section('contenedor_buscador_inicio_notificaciones')
    @include('publicaciones.menu')
@stop
