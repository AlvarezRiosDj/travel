@extends('admin.layouts.main')

@section('title','Lista de categorias')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            @if(session('status'))
                <div class="alert alert-info">
                    {!! session('status') !!}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">NUEVA CATEGORIA</a>
            <br><br>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>ESTADO</th>
                        <th>CREADO</th>
                        <th>ACTUALIZADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status}}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit',['id'=>$category->id]) }}" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection