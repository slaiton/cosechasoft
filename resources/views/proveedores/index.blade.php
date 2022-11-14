@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
      @can('crear-proveedores');
        <div class="col-md-8">
          <a class="btn btn-success" href="{{ route("proveedores.create") }}"> Nuevo </a>
        </div>
      @endcan
        <div class="mt-5 col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($proveedores as $item)

                    <tr>
                        <td> {{ $item->id_proveedor }} </td>
                        <td> {{ $item->nombre }} </td>
                        <td> {{ $item->documento }} </td>
                        <td> {{ $item->direccion }} </td>
                        <td> {{ $item->correo }} </td>
                        <td> {{ $item->telefono }} </td>
                        <td>
                          @can('editar-proveedores') 
                          <a class="btn btn-warning" href=""> Editar </a>
                          @endcan


                          @can('borrar-proveedores') 
                          <a class="btn btn-danger" href=""> Eliminar </a> </td>
                          @endcan 
                        </td>
                    </tr>
                        
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection