@extends('layouts.user')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center mt-4">

        @can('crear-usuarios')
        <div class="col-md-8">
          <a class="btn btn-success" href="{{ route("usuarios.create") }}"> Nuevo </a>
        </div>
        @endcan

        <div class="col-md-8 mt-5">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>E-Mail</th>
                    <th>Rol</th>
                    <th>Opciones</th>

                </thead>

                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                   @foreach ($user->getRoleNames() as $rolName)
                                   <h4><span class="badge bg-info">{{$rolName}}</span></h4>
                                   @endforeach             
                                @endif
                            </td>
                            <td>

                                @can('editar-usuarios')                                
                                   <a href="{{route('usuarios.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                                @endcan
                                
                                @can('borrar-usuarios')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $user->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan

                            </td>


                        </tr>s
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