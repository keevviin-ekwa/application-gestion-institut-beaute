@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Ajouter un Fournisseur</h1>
@stop

@section('content')

    <form action="{{route('store-fournisseur')}}" method="post">
        <div class="row">
            <x-adminlte-input name="nom" label="Nom *" placeholder="placeholder"
                              fgroup-class="col-md-6" disable-feedback/>
            @csrf
            <x-adminlte-input name="tel" label="Numero de telephone " placeholder="placeholder"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-input type="area" name="email" label="Email *" placeholder="placeholder"
                              fgroup-class="col-md-6" disable-feedback/>
            <x-adminlte-input name="adresse" label="Adresse *" placeholder="placeholder"
                              fgroup-class="col-md-6" disable-feedback/>
        </div>


        <div class="d-flex justify-content-end"><x-adminlte-button class="btn-flat" type="submit" label="Enregistrer" theme="success" icon="fas fa-lg fa-save"/></div>

    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
