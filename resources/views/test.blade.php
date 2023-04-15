<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Multistep Livewire Form Example</title>
    @livewireStyles
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap">
    <link href="{{ asset('multiform.css') }}" rel="stylesheet" id="bootstrap">
</head>
<body class="mt-5">
<div class="container">
    <div class="text-center">
        Laravel Form Wizard Example
    </div>
    <livewire:wizard />
</div>
</body>
@livewireScripts
</html>
