@extends('admin.layouts.main')

@section('title','Lista de Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            @if (session('status'))
                <div class="alert alert-info">
                    {!! session('status') !!}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.users.create')}}" class="btn btn-primary">NUEVO USUARIO</a>
            <br><br>
        </div>
        
        <div class="col-md-12">
            <table class="table table-bordered">                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE Y APELLIDOS</th>
                        <th>EMAIL</th>
                        <th>ESTADO</th>
                        <th>CREACION</th>
                        <th>ACTUALIZACION</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->status)
                                    <span class="badge badge-primary">HABILITADO</span>
                                @else
                                <span class="badge badge-danger">DESHABILITADO</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}" class="btn btn-success btn-sm"> <span class="fa fa-eye"></span> </a>
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm"> <span class="fa fa-edit"></span> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('script')



@endsection