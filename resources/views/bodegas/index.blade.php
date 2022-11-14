@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
      @can('crear-bodegas');
        <div class="col-md-8">
          <a class="btn btn-success" href="{{ route("bodegas.create") }}"> Nuevo </a>
        </div>
      @endcan
        <div class="mt-5 col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Ciudad</th>
                    <th>Administrador</th>
                    <th>Opciones</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($bodegas as $item)

                    <tr>

                        <td> {{ $item->id_bodega }} </td>
                        <td> {{ $item->nombre }} </td>
                        <td> {{ $item->direccion }} </td>
                        <td> {{ $item->telefono }} </td>
                        <td> {{ $item->ciudad }} </td>
                        <td> {{ $item->admin }} </td>
                        <td>
                          @can('editar-bodegas') 
                          <a class="btn btn-warning" href=""> Editar </a>
                          @endcan
  
  
                          @can('borrar-bodegas') 
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