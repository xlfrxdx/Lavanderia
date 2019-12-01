@extends('clients.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sistema Lavanderia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Crear Nuevo Cliente</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Num. Telefónico</th>
            <th width="280px">Accones</th>
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->pLastname }}</td>
            <td>{{ $client->mLastname }}</td>
            <td>{{ $client->number }}</td>
            <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Info</a>
    
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $clients->links() !!}
      
@endsection