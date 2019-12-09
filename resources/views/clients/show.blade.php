@extends('adminlte::page')

@section('title', 'Sistema Lavanderia')
  
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10 justify-content-center">
                <h3>Información Clientes</h3>
            </div>
            <div class="col-md-2 justify-content-center">
                <a style="float: right" class="btn btn-primary" href="{{ route('clients.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {{ $client->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido Paterno:</strong>
                    {{ $client->pLastname }} 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido Materno:</strong>
                    {{ $client->mLastname }} 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numero Telefónico:</strong>
                    {{ $client->number }} 
                </div>
            </div>
        </div>
    </div>
</div>    
@stop

