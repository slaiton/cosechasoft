@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
      @can('crear-productos');
        <div class="col-md-8">
          <a class="btn btn-success" href="{{ route("productos.create") }}"> Nuevo </a>
        </div>
      @endcan
        <div class="mt-5 col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th>Opciones</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Unidad Medida</th>
                    <th>Referencia</th>
                    <th>Valor</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($productos as $item)

                    <tr>
                        <td> {{ $item->id_producto }} </td>
                        <td> {{ $item->nombre }} </td>
                        <td> {{ $item->unidad_medida }} </td>
                        <td> {{ $item->referencia }} </td>
                        <td> {{ $item->valor }} </td>
                        <td>
                          @can('editar-productos') 
                          <a class="btn btn-warning" href=""> Editar </a>
                          @endcan


                          @can('borrar-productos') 
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