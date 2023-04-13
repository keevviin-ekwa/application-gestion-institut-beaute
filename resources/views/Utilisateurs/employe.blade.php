@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-card title="Employes"/>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3"><a href="{{route('create')}}"><x-adminlte-button data-toggle="modal" data-target="#modal" label="Ajouter" theme="primary" icon="fas fa-add"/></a></div>
    @if(session('success'))
        <x-adminlte-alert theme="success" title="Success">
            {{session('success')}}
        </x-adminlte-alert>
    @endif
    @php
        $heads = [
             'ID',
             'Nom',
             'Prenom',
             'Telephone',
             'email',
              'Date Creation',
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
        $image= '<img src=""/>';

        $config = [
            'data' => [
                [1, 'Defrisant', '<nobr>'.$image.'</nobr>','Un bon produit','5','50', '250','20/05/2023','20/05/2023','<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                [2, 'Defrisant', '<nobr>'.$image.'</nobr>','Un bon produit','5','50', '250','20/05/2023','20/05/2023','<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                [3, 'Defrisant', '<nobr>'.$image.'</nobr>','Un bon produit','5','50', '250','20/05/2023','20/05/2023','<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                [4, 'Defrisant', '<nobr>'.$image.'</nobr>','Un bon produit','5','50', '250','20/05/2023','20/05/2023','<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],

            ],
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
        @foreach($employes as $row)
            <tr>


                    <td>{!! $row->id !!}</td>
                    <td>{!! $row->nom !!}</td>
                    <td>{!! $row->prenom !!}</td>
                    <td>{!! $row->telehpone !!}</td>
                    <td>{!! $row->email !!}</td>
                    <td>{!! $row->created_at !!}</td>
                    <td>{!! $row->updated_at !!}</td>
                    <td>{!!'<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'!!}</td>

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
