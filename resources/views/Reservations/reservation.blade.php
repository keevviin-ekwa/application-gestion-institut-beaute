@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <x-adminlte-card title="Reservation"/>
@stop

@section('content')
    <div>

        <div id="stepper1" class="bs-stepper">
            <div class="bs-stepper-header">
                <div class="step" data-target="#test-l-1">
                    <button class="step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Email</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#test-l-2">
                    <button class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Password</span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#test-l-3">
                    <button class="step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Validate</span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form>
                    <div id="test-l-1" class="content">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" />
                        </div>
                        <button class="btn btn-primary" >Next</button>
                    </div>
                    <div id="test-l-2" class="content">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                        </div>
                        <button class="btn btn-primary" >Next</button>
                    </div>
                    <div id="test-l-3" class="content text-center">
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css"/>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script scr="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js" > console.log('Hi!'); </script>
    <script>
        $(document).ready(function () {
            var stepper = new Stepper($('.bs-stepper')[0])
            console.log("Hello")
        })

        var stepper = new Stepper(document.querySelector('.bs-stepper'))
        stepper.next()
    </script>
@stop
