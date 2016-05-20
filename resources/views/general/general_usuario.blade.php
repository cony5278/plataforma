@extends('bienvenido')
{{--publicaciones--}}
@section('configuracion')
    @include('usuario.configuracion.configuracion')
@stop
@section('usuario')
    @include('usuario.usuario')
@stop

@section('publicacion')
    @include('publicaciones.publicacion')
@stop
@section('contenedor_buscador_inicio_notificaciones')
    @include('publicaciones.menu')
@stop
