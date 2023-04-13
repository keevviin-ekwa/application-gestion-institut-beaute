@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

<h1>Liste des produits</h1>

@stop

@section('content')
   <div class="d-flex justify-content-end mb-3"><x-adminlte-button data-toggle="modal" data-target="#modal" label="Ajouter" theme="primary" icon="fas fa-add"/></div>
   <div>
       <div>
           <x-adminlte-modal id="modal" title="Noveau type de produit" theme="primary"
                             icon="fas fa-bolt" size='lg' enable-animations>
               <form action="{{route("create-type-produit")}}" class="form-group" method="post" >
                   <div class="d-flex flex-column justify-content-center">
                       @csrf
                       <x-adminlte-input name="libelle" label="Libelle" placeholder="Libelle"
                                          disable-feedback/>
                       <x-adminlte-button label="Enregistrer" type="submit"/>
                   </div>
               </form>

           </x-adminlte-modal>
       </div>
       @php
           $heads = [
               'ID',
               'Désignation',
                'Date création',
                'Date Modification',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
           ];

           $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                           <i class="fa fa-lg fa-fw fa-pen"></i>
                       </button>';
           $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                             <i class="fa fa-lg fa-fw fa-trash"></i>
                         </button>';
           $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                              <i class="fa fa-lg fa-fw fa-eye"></i>
                          </button>';

           $config = [
               'data' => [
                   [22, 'Produit de peau', '05/04/2023', '05/04/2023', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                   [19, 'produit pour ongles', '05/04/2023', '05/04/2023', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                   [3, 'Produit pour cheuveux',  '05/04/2023', '05/04/2023', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
               ],
               'order' => [[1, 'asc']],
               'columns' => [null, null, null, ['orderable' => false]],
           ];
       @endphp


      @if(session('success'))
           <x-adminlte-alert theme="success" title="Success">
               {{session('success')}}
           </x-adminlte-alert>
      @endif

       {{-- Minimal example / fill data using the component slot --}}
       <x-adminlte-datatable  striped hoverable beautify head-theme="light" theme="dark" id="table1" :heads="$heads">
           @foreach($data as $row)
               <tr>
                   @foreach(array_values($row) as $cell)
                       <td>{!! $cell !!}</td>
                   @endforeach
               </tr>
           @endforeach
       </x-adminlte-datatable>
       @stop



   </div>
   <div>

   </div>

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log(); </script>
@stop
