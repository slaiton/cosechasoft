@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
@auth

            {{-- <section class="sections"> --}}



            <div class="col-lg-12">

                <div class="" style="background-color:transparent;">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3 col-xl-3">
                                <div class="card bg-c-green order-card p-5">
                                    <div class="card-blok">
                                        <h5>Pedidos Entregados</h5>
                                        <h2 class="text-right"> <i class="fa fa-check f-left"></i> <span class="f-right">0</span> </h2>
                                    </div>  
                                </div>
                            </div>

                            <div class="col-md-3 col-xl-3">
                                <div class="card bg-c-pink order-card p-5">
                                    <div class="card-blok">
                                        <h5>Pedidos en Espera</h5>
                                        <h2 class="text-right"> <i class="fa fa-mug-hot f-left"></i> <span class="f-right">{{count($orden_compra)}}</span> </h2>
                                    </div>  
                                </div>
                            </div>

  

                            <div class="col-md-3 col-xl-3">
                                
                                <div class="card bg-c-blue order-card p-5">
                                    <div class="card-blok">
                                        <h5>Usuarios</h5>
                                        <h2 class="text-right"> <i class="fa fa-users f-left"></i> <span class="f-right">{{count($users)}}</span> </h2>
                                    </div>  
                                </div>

                            </div>
                            
                            <div class="col-md-3 col-xl-3">
                                <div class="card bg-c-purple order-card p-5">
                                    <div class="card-blok">
                                        <h5>Productos</h5>
                                        <h2 class="text-right"> <i class="fa fa-star f-left"></i> <span class="f-right">{{count($productos)}}</span> </h2>
                                    </div>  
                                </div>
                            </div>
                         
                 

                            
                        </div>
                    </div>
                </div>

            </div>



            <div class="card">
                {{-- <div class="card-header">{{ __('Bienvenido') }} {{ Auth::user()->name }}</div> --}}
                <div class="card-header">{{ __('Pedidos en Espera') }}</div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th># Pedido</th>
                                <th>Proveedor</th>
                                <th>Bodega Destino</th>
                                <th>Ciudad</th>
                                <th>Fecha Pedido</th>
                                <th>Fecha Entrega</th>
                                <th>Valor Mercancia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orden_compra as $item)
                            <tr>
                               <td> {{ $item->id_orden }} </td>
                               <td> {{ $item->nombre_bodega_destino }} </td>
                               <td> {{ $item->nombre_proveedor." - ".$item->dir_bodega  }} </td>
                               <td> {{ $item->ciudad_bodega }} </td>
                               <td> {{ $item->fecha_creacion }} </td>
                               <td> {{ $item->fecha_estimada  }} </td>
                               <td> {{ number_format($item->valor_total)  }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        {{-- </section> --}}

@endauth

            @guest
                <script>
                window.location.href = "{{ route('login')}}";
                </script>

            @endguest
        </div>
    </div>
</div>
@endsection
