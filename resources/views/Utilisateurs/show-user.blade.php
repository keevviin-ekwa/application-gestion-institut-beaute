@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <x-adminlte-card title="Détails"/>
@stop

@section('content')
    <div>
        <x-adminlte-profile-widget name="{{$data->prenom}}" desc="{{$data->role->libelle}}" theme="primary"
                                   img="https://picsum.photos/id/1011/100">
            <x-adminlte-profile-col-item class="text-primary border-right" icon="fas fa-lg fa-gift"
                                         title="Reservations" text="25" size=6 badge="primary"/>
            <x-adminlte-profile-col-item class="text-danger" icon="fas fa-lg fa-users" title="Points"
                                         text="10" size=6 badge="danger"/>
        </x-adminlte-profile-widget>

    </div>

    <div class="my-5">

        <x-adminlte-card title="Reservations"/>
        @php
            $heads = [
                 'ID',
                 'date de reservation',
                 'Statut',

                 'Date Creation',
                 'Date Modification',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];


            function edit($id){
                    $route =url("admin/utilisateurs/edit/".$id);
                    return $btnEdit = '<a href='.$route.'><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button></a>';
                }

           function detail($id){
                 $route =url("admin/utilisateurs/show/".$id);
                return   $btnDetails = '<a href='.$route.'><button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                               <i class="fa fa-lg fa-fw fa-eye"></i>
                           </button></a>';
           }

            $config = [

                'order' => [[1, 'asc']],
                'columns' => [null, null, null, ['orderable' => false]],

            ];

            $_config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
                      <"row" <"col-12" tr> >
                      <"row" <"col-sm-12 d-flex justify-content-start" f> >';
            $_config['paging'] = false;
            $_config["lengthMenu"] = [ 10, 50, 100, 500];

        @endphp

        {{-- Minimal example / fill data using the component slot --}}
        <x-adminlte-datatable striped hoverable beautify head-theme="light" theme="dark" id="table1" :heads="$heads"  :config="$_config"  striped hoverable with-buttons >

        </x-adminlte-datatable>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
