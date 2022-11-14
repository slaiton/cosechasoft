@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("bodegas") }}"> Volver </a>
                <h1 class="bd-title"> Nueva Bodega </h1>
                
            </div>
        </div>

        <div class="mt-5 col-lg-8">

            <form method="POST" action="">

                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="direccion" placeholder="Direccion"> 
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="telefono" placeholder="Telefono">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="Ciudad" placeholder="Ciudad"> 
                    </div>
                </div>

                <input type="submit" class="mt-4 btn btn-success" value="Guardar">
            </form>

        </div>

    </div>


</div>




@endsection