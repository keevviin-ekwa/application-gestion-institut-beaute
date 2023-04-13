@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-card title="Ajouter un Utilisateur"/>
@stop

@section('content')

    <form action="{{route('store-user')}}" method="post">
        <div class="row">
            <x-adminlte-input name="nom" label="Nom *" placeholder="Nom..."
            class="rounded-0"         fgroup-class="col-md-6" disable-feedback/>
            @csrf
            <x-adminlte-input name="prenom" label="Prenom " placeholder="Prenom..."
            class="rounded-0"        fgroup-class="col-md-6" disable-feedback/>
            @csrf
        </div>
        <div class="row">
            <x-adminlte-input type="email" name="email" label="Email *" placeholder="Email..."
            class="rounded-0"      fgroup-class="col-md-6" disable-feedback/>
            <x-adminlte-input name="adress" label="Adresse *" placeholder="Adresse..."
            class="rounded-0"     fgroup-class="col-md-6" disable-feedback/>
        </div>

        <div class="row">
            <x-adminlte-input type="number" name="tel" label="Telephone *" placeholder="Telephone..."
            class="rounded-0"     fgroup-class="col-md-6" disable-feedback/>
            <x-adminlte-select data-title="Selectionner le role..." class="rounded-0"  fgroup-class="col-md-6" label="Role *" name="role">

                @foreach($roles as $role)
                     <option selected value="{{$role->id}}">{{$role->libelle}}</option>
                 @endforeach
             </x-adminlte-select>
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
