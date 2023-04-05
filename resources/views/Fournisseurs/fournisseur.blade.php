@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Ajouter un produit</h1>
@stop

@section('content')

    <div class="row">
       <x-adminlte-input name="iLabel" label="Libelle *" placeholder="placeholder"
                                            fgroup-class="col-md-6" disable-feedback/>
             <x-adminlte-input name="iLabel" label="Image " placeholder="placeholder"
                                             fgroup-class="col-md-6" disable-feedback/>
    </div>
    <div class="row">
        <x-adminlte-input type="area" name="iLabel" label="Quantite *" placeholder="placeholder"
                          fgroup-class="col-md-6" disable-feedback/>
        <x-adminlte-input name="iLabel" label="Quantite minimal *" placeholder="placeholder"
                          fgroup-class="col-md-6" disable-feedback/>
    </div>

    <div class="row">
        <x-adminlte-select  fgroup-class="col-md-6" label="Type de produit *" name="optionsTest1">
            <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="1"
                                empty-option="Selectioner un type..."/>
        </x-adminlte-select>
        <x-adminlte-select  fgroup-class="col-md-6" label="Fournisseur *" name="optionsTest1">
            <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="1"
                                empty-option="Selectionner un fournisseur..."/>
        </x-adminlte-select>
    </div>
    <div class="row">
        <x-adminlte-input type="area" name="iLabel" label="Prix *" placeholder="placeholder"
                          fgroup-class="col-md-6" disable-feedback/>
        <x-adminlte-textarea fgroup-class="col-md-6" label="Description *" name="taBasic" placeholder="description..."/>
    </div>
   <div class="d-flex justify-content-end"><x-adminlte-button class="btn-flat" type="submit" label="Enregistrer" theme="success" icon="fas fa-lg fa-save"/></div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
