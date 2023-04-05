@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Liste des produits</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end mb-3"><a href="{{route('create-product')}}"><x-adminlte-button data-toggle="modal" data-target="#modal" label="Ajouter" theme="primary" icon="fas fa-add"/></a></div>
    @php
        $heads = [
             'ID',
             'Designation',
             'Photo',
             'Description',
             'quantité minimum',
             'Quantite',
             'Prix',
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
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
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
