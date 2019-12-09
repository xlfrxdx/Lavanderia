@extends('adminlte::page')

@section('title', 'Sistema Lavanderia')
  
@section('content')
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card mb-0">
    <div class="card-header">
        <div class="row">
            <h3>Crear Cliente</h3>
        </div>
    </div>

    <form action="{{ route('clients.store') }}" method="POST">
        <div class="card-body">        
            @csrf        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Nombre">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellido Paterno:</strong>
                        <input type="text" name="pLastname" class="form-control" placeholder="Apellido Paterno">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellido Materno:</strong>
                        <input type="text" name="mLastname" class="form-control" placeholder="Apellido Materno">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Num. Telefónico:</strong>
                        <input type="text" name="number" class="form-control" placeholder="Num. Telefónico">
                    </div>
                </div>

                <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                    </div>
                </div> -->
                
            </div>
        </div>
        <div class="card-footer">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Regresar</a>
            </div>
        </div>
    </form>
    
</div>

@stop