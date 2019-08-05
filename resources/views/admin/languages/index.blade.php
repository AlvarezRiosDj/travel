@extends('admin.layouts.main')

@section('title','Lista de lenguajes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.languages.create') }}" class="btn btn-primary">Nuevo Lenguaje</a>
        </div>
        <div class="col-md-12">
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ABBR</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACTUALIZADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>{{ $language->abbr }}</td>
                            <td>{{ $language->name }}</td>
                            <td>{{ $language->created_at }}</td>
                            <td>{{ $language->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.languages.edit',['id'=>$language->abbr]) }}" class="btn btn-warning btn-sm"> <span class="fa fa-edit"></span> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection