@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <x-adminlte-card title="Modifier un fournisseur"/>
@stop

@section('content')

    <form action="{{url('admin/fournisseurs/update/'.$fournisseur->id)}}" method="put">
        <div class="row">
            <x-adminlte-input name="nom" label="Nom *" placeholder="placeholder"
                      value="{{$fournisseur->nom}}"         class="rounded-0 @error('name') border-danger @enderror"    fgroup-class="col-md-6 " disable-feedback/>
            @csrf
            <x-adminlte-input name="tel" label="Numero de telephone " placeholder="placeholder"
                              value="{{$fournisseur->Tel}}"  class="rounded-0 @error('tel') border-danger @enderror"   fgroup-class="col-md-6 rounded-0" disable-feedback/>
        </div>
        <div class="row">
            <x-adminlte-input type="area" name="email" label="Email *" placeholder="placeholder"
                              value="{{$fournisseur->email}}"          class="rounded-0 @error('email') border-danger @enderror"  fgroup-class="col-md-6 rounded-0" disable-feedback/>
            <x-adminlte-input name="adresse" label="Adresse *" placeholder="placeholder"
                              class="rounded-0 @error('adresse') border-danger @enderror"  fgroup-class="col-md-6 rounded-0" disable-feedback/>
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
