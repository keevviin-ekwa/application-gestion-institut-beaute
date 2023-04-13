@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Ajouter un produit</h1>
@stop

@section('content')

   <form action="{{route('store-produit')}}" method="POST">
    <div class="row">
        <x-adminlte-input class="rounded-0" name="libelle" label="Designation *" placeholder="designation..."
                                             fgroup-class="col-md-6" disable-feedback/>
      <x-adminlte-textarea class="rounded-0" fgroup-class="col-md-6" label="Description *" name="description" placeholder="description..."/>


            @csrf
     </div>
     <div class="row">
         <x-adminlte-input class="rounded-0" type="area" name="quantite" label="Quantite *" placeholder="placeholder"
                           fgroup-class="col-md-6" disable-feedback/>
         <x-adminlte-input class="rounded-0" name="quantitemin" label="Quantite minimal *" placeholder="placeholder"
                           fgroup-class="col-md-6" disable-feedback/>
     </div>

     <div class="row">
         <x-adminlte-select n data-title="Selectionner le type..." class="rounded-0"  fgroup-class="col-md-6" label="Type de produit *" name="type">
             @foreach($types as $type)
                 <option data-icon="fa fa-fw fa-car" value="{{$type->id}}">{{$type->libelle}}</option>
             @endforeach
         </x-adminlte-select>
         <x-adminlte-select class="rounded-0"  fgroup-class="col-md-6" label="Fournisseur *" name="fournisseur">
             @foreach($fournisseurs as $fournisseur)
                 <option data-icon="fa fa-fw fa-car" value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
             @endforeach
         </x-adminlte-select>
     </div>
     <div class="row">
         <x-adminlte-input class="rounded-0" type="area" name="prix" label="Prix *" placeholder="placeholder"
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
