@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("proveedores") }}"> Volver </a>
                <h1 class="bd-title"> Nuevo Proveedor </h1>
                
            </div>
        </div>

        <div class="mt-5 col-lg-8">

            <form method="POST" action="">

                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="documento" placeholder="Documento"> 
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="direccion" placeholder="Direccion"> 
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-group-lg mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control form-control-lg" name="correo" placeholder="Correo"> 
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" name="telefono" placeholder="Telefono"> 
                    </div>

                    <div class="col-md-6">
                        <select type="text" class="form-select form-select-lg" name="estado">
                            <option value="1">ACTIVO</option>
                            <option value="2">INACTIVO</option>
                        </select> 
                    </div>
                </div>

                <input type="submit" class="mt-4 btn btn-success" value="Guardar">
            </form>

        </div>

    </div>


</div>




@endsection