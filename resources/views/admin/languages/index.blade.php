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
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>CREADO</td>
                        <td>ACTUALIZADO</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection