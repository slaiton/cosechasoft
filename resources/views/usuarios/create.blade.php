@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("usuarios") }}"> Volver </a>
                <h1 class="bd-title"> Nuevo Usuario </h1>

            </div>
        </div>

   
    
    <div class="mt-5 col-lg-8">

        <form method="POST" action="{{ route('usuarios.store')}}">
            
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Nombre">
                </div>
                <div class="col"> 
                    <div class="input-group input-group-lg mb-3">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" class="form-control form-control-lg" name="email" placeholder="Correo"> 
                </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Contraseña">
                </div>
                <div class="col"> 
                      <input type="password" class="form-control form-control-lg" name="confirm-password" placeholder="Confirmar contraseña"> 
                </div>
            </div>

            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <label for="">Roles</label>
                    {!! Form::select('roles[]', $roles, [], array('class'=>'form-select form-select-lg')) !!}
                </div>
            </div>

            <div class="col-xs-12 mt-2 p-2">
                <button type="submit" class="btn btn-success">Guardar</button>

            </div>

        </form>

     </div>

   </div>

</div>


@endsection