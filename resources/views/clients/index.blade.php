@extends('adminlte::page')

@section('title', 'Sistema Lavanderia')

@section('content' )
    
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 justify-content-center">
                            <h3>Index Clientes</h3>
                        </div>
                        <div class="col-md-2 justify-content-center">
                            <a  style="float: right" class="btn btn-success" href="{{ route('clients.create') }}"> Crear Nuevo Cliente</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Num. Telefónico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                    
                </table>
                </div>
            </div>
        </div>
    </div>
</div>  
  
    {!! $clients->links() !!}
      
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
        $(document).ready( function () {
            $('#example').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                }
            });
        });
        
  </script>
@stop