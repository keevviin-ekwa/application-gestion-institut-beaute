@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Soins</h1>

@stop


@section('content')
    <form action="{{route("store-soin")}}" method="post">

        <div class="row">
            <x-adminlte-input value="{{$edit->libelle ?? '   '}}" enable-old-support class="rounded-0" name="libelle" label="Libelle *" placeholder="Libelle..."
                                                 fgroup-class="col-md-6" disable-feedback/>
             <x-adminlte-select data-title="Selectionner le type..." class="rounded-0"  fgroup-class="col-md-6" label="Type de Soin *" name="type">
                 @foreach($types as $type)
                     <option value="{{$type->id}}">{{$type->libelle}}</option>
                 @endforeach
             </x-adminlte-select>
             @csrf


         </div>
         <div class="row">
             <x-adminlte-input value="{{$edit->duree ?? '   '}}" class="rounded-0" type="area" name="duree" label="Duree *" placeholder="Duree en minutes..."
                               fgroup-class="col-md-6" disable-feedback/>
             <x-adminlte-input value="{{$edit->cout ?? '   '}}" class="rounded-0" type="area" name="cout" label="Prix *" placeholder="placeholder"
                               fgroup-class="col-md-6" disable-feedback/>

         </div>
         <div class="row">

             <x-adminlte-textarea value="{{$edit->description ?? '   '}}" class="rounded-0" fgroup-class="col-md-6" label="Description *" name="description" placeholder="description..."/>
             @section('plugins.Select2', true)
             @php
                 $config = [
                     "placeholder" => "Selectionner les produits associes...",
                     "allowClear" => true,
                 ];
             @endphp
             <x-adminlte-select2 style="height: 48px"  id="sel2Category" name="produits[]" label="Produits"
                                fgroup-class="col-md-6"   igroup-size="lg" :config="$config" multiple>
                 <x-slot name="prependSlot">
                     <div style="height: 48px" class="input-group-text">
                         <i class="fas fa-tag"></i>
                     </div>
                 </x-slot>
                 <x-slot name="appendSlot">
                     <x-adminlte-button style="height: 48px" theme="outline-dark" label="Effacer" icon="fas fa-lg fa-ban "/>
                 </x-slot>
                 @foreach($produits as $produit)
                     <option  value="{{$produit->id}}">{{$produit->libelle}}</option>
                 @endforeach
             </x-adminlte-select2>
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
