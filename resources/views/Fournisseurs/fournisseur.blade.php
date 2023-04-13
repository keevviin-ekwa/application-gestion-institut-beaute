@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <x-adminlte-card title="Fournisseurs"/>

@stop

@section('content')
    <div class="d-flex justify-content-end mb-3"><a href="{{route('create-fournisseur')}}"><x-adminlte-button label="Ajouter un Fournissuer" theme="primary" icon="fas fa-add"/></a></div>
    @php

        $heads = [
             'ID',
             'Nom',
             'Tel',
             'Email',
             'Date Creation',
              'Date Modification',
              'Adresse',
             ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];

        function edit($id){
                $route =url("admin/fournisseurs/edit/".$id);
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

    @if(session('success'))
        <x-adminlte-alert theme="success" title="Success">
            {{session('success')}}
        </x-adminlte-alert>
    @endif
    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable striped hoverable beautify head-theme="light" theme="dark" id="table1" :heads="$heads"  :config="$_config"  striped hoverable with-buttons >
        @foreach($fournisseurs as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
                    <td>{!! '<nobr>'.edit($row->id).$btnDelete.$btnDetails.'</nobr>'!!}</td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
