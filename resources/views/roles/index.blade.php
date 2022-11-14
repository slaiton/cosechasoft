@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center mt-4">

        @can('crear-rol')
           <div class="col-md-8">
               <a class="btn btn-success" href="{{ route("roles.create") }}"> Nuevo </a>
           </div>
        @endcan

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


        <div class="col-md-8 mt-5">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </thead>

                <tbody>

                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->name}}</td>
                            <td>

                                @can('editar-rol')

                                    <a href="{{route('roles.edit', $rol->id)}}" class="btn btn-warning">Editar</a>

                                @endcan

                                @can('borrar-rol')

                                     {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $rol->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                     {!! Form::close() !!}

                                @endcan

                            </td>

                        </tr>
                    @endforeach



                </tbody>

            </table>

            <div class="pagination justify-conten-center">
                {{-- {!! $user->links() !!} --}}
            </div>


        </div>


    </div>
</div>



@endsection