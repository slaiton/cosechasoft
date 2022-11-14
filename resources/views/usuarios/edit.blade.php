@extends('layouts.user')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="mt-4 col-lg-6">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
                
                <a class="btn btn-primary" href="{{ url("usuarios") }}"> Volver </a>
                <h1 class="bd-title"> Editar Usuario </h1>

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

        {{-- <form method="PATCH" action="{{ route('usuarios.update', $user->id)}}"> --}}

            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuarios.update', $user->id]]) !!}
            
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="">Proveedor</label>
                    <input class="form-control form-control-lg" name="name" value="{{$user["name"]}}" >
                </div>
                <div class="col-md-6">
                    <label for="">Bodega</label>
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input class="form-control form-control-lg" name="email" value="{{$user["email"] }}" >
                   </div>
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

        {{-- </form> --}}

        {!! Form::close() !!}

     </div>

   </div>

</div>


@endsection