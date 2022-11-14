@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("ordenCompra") }}"> Ver Ordenes </a>
                <h2> # {{$orden_compra["id_orden"]}} </h2>
                <h1 class="bd-title">Orden de Compra</h1> 
                
            </div>
        </div>

        <div class="mt-5 col-lg-8">


            <form method="POST" class="newOrden">

                <input type="hidden" name="fecha_creacion" value="{{ date("Y-m-d") }}">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="">Proveedor</label>
                        <input class="form-control form-control-lg" value="{{$orden_compra["nombre_proveedor"]}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Bodega</label>
                        <input class="form-control form-control-lg" value="{{$orden_compra["nombre_bodega_destino"].",  ".$orden_compra["dir_bodega"]  }}" readonly>
                    </div>
                </div>
                <div class="row g-3 mt-3">
          
                    <div class="col">
                        <label for="">Fecha Creacion</label>
                        <input type="text" class="form-control form-control-lg"  value="{{ $orden_compra["fecha_creacion"] }}"> 
                    </div>

                    <div class="col-md-6">
                        <label for="">Fecha Entrega</label>
                        <input class="form-control form-control-lg" value="{{$orden_compra["fecha_estimada"]}}" readonly>
                    </div>

                </div>
                <div class="row g-3 mt-3">
              
                    <div class="col">
                        <label for="">Valor Total</label>
                        <div class="input-group input-group-lg md-6">
                            <span class="input-group-text">COL $</span>
                            <input type="text" class="form-control form-control-lg" id="valor_total" name="valor_total" value="{{number_format($orden_compra["valor_total"])}}" aria-label="Valor" readonly>
                         </div>
                    </div>
                    <div class="col">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control form-control-lg"  value="{{ $orden_compra["usuario"] }}"> 
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Unidades</th>
                                <th>Descripcion</th>
                                <th>Valor</th>
                            </tr>

                            <input type="hidden" id="totalDetalles" name="totalDetalles" value="1">

                            <tbody id="contDetalle">

                                @foreach ($detalle_orden_compra as $detalle)
                            
                                        <tr>
                                            <td>
                                                <input type="number" class="form-control form-control-lg" value="{{ $detalle["cantidad"] }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-lg" value="{{ $detalle["producto"] }}" readonly>                                                
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-lg" value="{{ $detalle["unidad_medida"] }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-lg" value="{{ $detalle["descripcion"] }}" readonly>    
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-control-lg" value="{{  "$".number_format($detalle["precio_producto"]*$detalle["cantidad"]) }}" readonly>
                                            </td>
                
                                        </tr>
                                
                                @endforeach

                                <tr>
                                    <td colspan=5><h3 style="text-align:end;">Total: ${{number_format($orden_compra["valor_total"])}}</h3></td>

                                </tr>


                            </tbody>

                        </thead>

                    </table>

                </div>

            </form>
        </div>
    </div>
</div>




@endsection