@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("roles") }}"> Volver </a>
                <h1 class="bd-title"> Nuevo Rol </h1>

            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger fade show" role="alert">
            @foreach ($errors->all() as $error)

            <span class="badge badge-warning">{{$error}}</span>
            
            @endforeach
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        @endif

   
    
    <div class="mt-5 col-lg-8">

        <form method="POST" action="{{ route('roles.store')}}">
            
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Nombre">
                    <input type="hidden" name="guard_name" value="web">
                </div>
            </div>

            <div class="row g-3 mt-4">
                <label for="">Permisos Usuario</label>
                  <div class="checkbox-contain">
                   @foreach ($permission as $permiso)
   
                       <label class="p-1">{!! Form::checkbox('permission[]', $permiso->id, false, array('class' => 'custom-control-input p-2') ) !!}
                       {{$permiso->name}}</label>
                       
                   @endforeach
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