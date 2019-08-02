@extends('admin.layouts.main')

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
            <a href="{{ route('admin.groups.create') }}" class="btn btn-primary">NUEVO GRUPO</a>
            <br><br>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>GRUPO</th>
                        <th>CREADO</th>
                        <th>ACTUALIZADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr> 
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->created_at }}</td>
                        <td>{{ $group->updated_at }}</td>
                        <td> <a href="{{ route('admin.groups.edit',['id'=>$group->id]) }}" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span> </a> </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection