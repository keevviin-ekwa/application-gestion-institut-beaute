@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Tableau de bord</h1>
@stop

@section('content')
  <div class="row mb-3 align-items-center">
      <div class="col-md-4 px-5"><x-adminlte-small-box title="528" text="Clients" icon="fas fa-user-plus text-teal"
                                                       theme="primary" url="#" url-text="Voir tous les clients"/></div>
      <div class="col-md-4 px-5"><x-adminlte-small-box title="528" text="Employes" icon="fas fa-user-plus text-teal"
                                                       theme="info" url="#" url-text="Voir tous les employés"/></div>
      <div class="col-md-4 px-5"><x-adminlte-small-box title="528" text="Fournisseurs" icon="fas fa-user-plus text-teal"
                                                       theme="warning" url="#" url-text="Voir tous les fournisseurs"/></div>
  </div>
  <br>
  <br><br><br><br><br>

    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-start">Top 5 clients</div>
            @php
                $heads = [
                    'ID',
                    'Name',
                    'Email',
                    'Score',
                    ['label' => 'Contact', 'width' => 40],

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
                        [1, 'John Bender','bayard@gmail.com','10','+02 (123) 123456789'],
                        [2, 'Sophia Clemens','bayard@gmail.com','10', '+99 (987) 987654321'],
                        [3, 'Peter Sousa', 'bayard@gmail.com','10','+69 (555) 12367345243'],
                        [4, 'Peter Sousa', 'bayard@gmail.com','10','+69 (555) 12367345243'],
                        [5, 'Peter Sousa', 'bayard@gmail.com','10','+69 (555) 12367345243'],
                    ],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable  striped hoverable beautify head-theme="light" theme="dark" id="table1" :heads="$heads">
                @foreach($config['data'] as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{!! $cell !!}</td>
                        @endforeach
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
        <div class="col-md-6">
            <div class=" row d-flex justify-content-start">Top 5 Employés</div>
            @php
                $heads = [
                    'ID',
                    'Name',
                    ['label' => 'Phone', 'width' => 40],
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
                        [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    ],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable  striped hoverable beautify head-theme="light" theme="warning" with-buttons with-buttons id="table1" :heads="$heads">
                @foreach($config['data'] as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{!! $cell !!}</td>
                        @endforeach
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
