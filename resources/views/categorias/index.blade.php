@extends('adminlte::page')

@section('title', 'Sistema Lavanderia')

@section('content' )
    
@if ($message = Session::get('info'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 justify-content-center">
                            <h3>Index Categorías</h3>
                        </div>
                        <div class="col-md-2 justify-content-center">
                            <a  style="float: right" class="btn btn-success" href="{{ route('categorias.create') }}"> Crear Nueva Categoria</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Lista as $categoria)
                        <tr>                        
                            <td>{{ $categoria->Nombre }}</td>
                            <td>{{ $categoria->Descripcion }}</td>
                            <td>
                                
                                    <a class="btn btn-info" href="{{ route('categorias.show',$categoria->id) }}">Info</a>

                                    <a class="btn btn-primary" href="{{ route('categorias.edit',$categoria->id) }}">Editar</a>

                                    @csrf                    
                                    <button onclick="eliminarCSRF('{{ $categoria->id }}', '{{ $categoria->Nombre }}' )" class="btn btn-danger">Eliminar</button>
                                
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
  
    {!! $Lista->links() !!}
      
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

        function borrarRegistro(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        }        

        function eliminarCSRF(id, nombre) {
            
            Swal.fire({
                title: '¿Desea eliminar el registro: ' + nombre + '?',
                text: "Esta acción no se podrá revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#0c7cd5',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: '¡No, cancelar!',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {
                        var token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{url('categorias/destroy')}}/" + id,
                            method: "post",
                            dataType: "json",
                            data: {
                                "_token": token,
                                id: id,
                            },
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: data.message,
                                        allowOutsideClick: false,
                                        confirmButtonColor: '#0c7cd5',
                                        allowEscapeKey: false
                                    }).then(function () {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'info',
                                        title: data.message,
                                        allowOutsideClick: false,
                                        confirmButtonColor: '#0c7cd5',
                                        allowEscapeKey: false
                                    }).then(function () {
                                        location.reload();
                                    });
                                }

                            },
                            error: function () {
                                Swal.fire({
                                    title: "¡Algo salió mal!",
                                    text: "¡Ha ocurrido un error al eliminar el registro, si el problema continua comunicate con el administrador!",
                                    icon: "error",
                                    allowOutsideClick: false,
                                    confirmButtonColor: '#0c7cd5',
                                    allowEscapeKey: false
                                }, function () {
                                    location.reload();
                                });
                            }
                        });
                    });
                },
                allowOutsideClick: false,
                allowEscapeKey: false
            });
        }
  </script>
@stop