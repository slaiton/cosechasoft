@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("productos") }}"> Volver </a>
                <h1 class="bd-title"> Nuevo Producto </h1>
                
            </div>
        </div>

        <div class="mt-5 col-lg-8">

            <form method="POST" action="">

                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="unidad" placeholder="Unidad de medida"> 
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                      <div class="input-group input-group-lg md-6">
                          <span class="input-group-text">$</span>
                          <input type="text" class="form-control form-control-lg" name="precio" aria-label="Valor" placeholder="Precio (Pesos)">
                       </div>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="referencia" placeholder="Referencia"> 
                    </div>
                </div>

                <input type="submit" class="mt-4 btn btn-success" value="Guardar">
            </form>

        </div>

    </div>


</div>




@endsection