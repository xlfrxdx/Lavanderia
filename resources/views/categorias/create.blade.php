@extends('adminlte::page')

@section('title', 'Sistema Lavanderia')
  
@section('content')
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo algunos problemas con sus datos.<br><br>
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
            <h3>Crear Categoría</h3>
        </div>
    </div>

    <form action="{{ route('categorias.store') }}" method="POST">
        <div class="card-body">        
            @csrf        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:150px; resize: none;" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="card-footer">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Regresar</a>
            </div>
        </div>
    </form>
    
</div>

@stop