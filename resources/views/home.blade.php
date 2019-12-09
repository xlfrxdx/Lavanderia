@extends('adminlte::page')

@section('title', 'Sistema Lavanderia')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop