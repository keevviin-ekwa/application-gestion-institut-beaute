@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Ajouter un Employé</h1>
@stop

@section('content')

    <form action="" method="post">
        <div class="row">
            <x-adminlte-input name="nom" label="Nom *" placeholder="Nom..."
                              fgroup-class="col-md-6" disable-feedback/>
            @csrf
            <x-adminlte-input name="prenom" label="Prenom " placeholder="Prenom..."
                              fgroup-class="col-md-6" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-input name="email" label="Email *" placeholder="Email..."
                              fgroup-class="col-md-6" disable-feedback/>
            <x-adminlte-input name="adresse" label="Adresse *" placeholder="Adresse..."
                              fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input name="tel" label="Telephone *" placeholder="Telephone..."
                              fgroup-class="col-md-6" disable-feedback/>
            <x-adminlte-input type="password" name="password" label="Mot de passe *" placeholder="Mot de passe"
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
