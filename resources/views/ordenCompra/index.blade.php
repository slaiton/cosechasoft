@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
          <a class="btn btn-success" href="{{ route("ordenCompra.create") }}"> Nuevo </a>
        </div>
        <div class="mt-5 col-md-10">
            <table class="table">
                <thead>
                  <tr>
                    <th>Opciones</th>
                    <th>Id</th>
                    <th>Bodebga</th>
                    <th>Ciudad</th>
                    <th>Direccion</th>
                    <th>Proveedor</th>
                    <th>Fecha Orden</th>
                    <th>Fecha Entrega</th>
                    <th>Valor Total</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($orden_compra as $item)

                    <tr>
                        <td> 
                             <a class="btn btn-primary" href="{{ url("ordenCompra/$item->id_orden") }}"> Ver </a>
                             @can('editar-orden-compra')
                             <a class="btn btn-warning" href="{{ url("ordenCompra/$item->id_orden/edit") }}"> Editar </a> 
                             @endcan
                        </td>
                        <td> {{ $item->id_orden }} </td>
                        <td> {{ $item->nombre_bodega_destino }} </td>
                        <td> {{ $item->ciudad_bodega }} </td>
                        <td> {{ $item->dir_bodega }} </td>
                        <td> {{ $item->nombre_proveedor }} </td>
                        <td> {{ $item->fecha_creacion }} </td>
                        <td> {{ $item->fecha_estimada  }} </td>
                        <td> {{ number_format($item->valor_total)  }} </td>
                    </tr>
                        
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection