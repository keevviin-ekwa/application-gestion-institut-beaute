@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-card title="Type de Soins"/>

@stop

@section('content')
    <div class="">
        <div class="d-flex justify-content-end mb-3"><x-adminlte-button data-toggle="modal" data-target="#modal" label="Ajouter" theme="primary" icon="fas fa-add"/></div>
        <div>
            <x-adminlte-modal id="modal" title="Noveau type de Soin" theme="primary"
                              icon="fas fa-bolt" size='lg' enable-animations>
                <form action="{{route("create-type-soin")}}" class="form-group" method="post" >
                    <div class="d-flex flex-column justify-content-center">
                        @csrf
                        <x-adminlte-input name="libelle" label="Libelle" placeholder="Libelle"
                                          disable-feedback/>
                        <x-adminlte-button label="Enregistrer" type="submit"/>
                    </div>
                </form>
            </x-adminlte-modal>
        </div>
        @if(session('success'))
        <x-adminlte-alert theme="success" title="Success">
            {{session('success')}}
        </x-adminlte-alert>
    @endif
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
                'order' => [[1, 'asc']],
                'columns' => [null, null, null, ['orderable' => false]],
            ];
        @endphp

        {{-- Minimal example / fill data using the component slot --}}
        <x-adminlte-datatable striped hoverable beautify head-theme="light" theme="dark" id="table1" :heads="$heads"  :config="$config"  striped hoverable with-buttons >
            @foreach($types as $row)
                <tr>


                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                    <td>{!! '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'!!}</td>

                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
    <div class="my-5">
        <br>
        <br>
        <x-adminlte-card title="Soins"/>
        <div class="d-flex justify-content-end mb-3"><a href="{{route('create-soin')}}"><x-adminlte-button data-toggle="modal" data-target="#modal" label="Ajouter" theme="primary" icon="fas fa-add"/></a></div>
        @php



            $heads = [
                 'ID',
                 'Libelle',
                 'Description',
                  'duree',
                  'cout ',
                  'Type de soin',
                  'Date Creation',
                  'Date Modification',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];

            function edit($id){
                $route =url("admin/soins/edit/".$id);

                return $btnEdit = '<a href='.$route.'><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button></a>';
            }

            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                          </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                               <i class="fa fa-lg fa-fw fa-eye"></i>
                           </button>';
            $image= '<img src=""/>';

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
            @foreach($soins as $row)
                <tr>

                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                    <td>{!! '<nobr>'.edit($row->id).$btnDelete.$btnDetails.'</nobr>'!!}</td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css" >
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
