@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <x-adminlte-card title="Reservation"/>
@stop

@section('content')
   <livewire:wizard/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css"/>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    @livewireScripts

@stop
