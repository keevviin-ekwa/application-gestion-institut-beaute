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
        @foreach($employes as $row)
            <tr>


                    <td>{!! $row->id !!}</td>
                    <td>{!! $row->nom !!}</td>
                    <td>{!! $row->prenom !!}</td>
                    <td>{!! $row->telehpone !!}</td>
                    <td>{!! $row->email !!}</td>
                    <td>{!! $row->created_at !!}</td>
                    <td>{!! $row->updated_at !!}</td>
                    <td>{!!'<nobr>'.edit($row->id).detail($row->id).'</nobr>'!!}</td>

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
