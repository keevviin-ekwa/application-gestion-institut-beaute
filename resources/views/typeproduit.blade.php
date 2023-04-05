@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

<h1>Liste des produits</h1>
@stop

@section('content')
@php
$heads = [
'ID',
'Designation',
'Image',
'Date creation',
'Date Modification',

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
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach(json_decode($typeProduits, true) as $row)

    <tr>
        @foreach(array_values($row) as $cell)
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
<script> console.log(); </script>
@stop
