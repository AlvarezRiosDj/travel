@extends('admin.layouts.main')

@section('title','Crear Usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            @include('admin.layouts.errors')
        </div>
        <div class="col-md-12">
            {{ Form::open(['route' => 'admin.users.store','id'=>'form_guardar']) }}
                <div class="row">
                    @include('admin.users.form')
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">ATRAS</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" form="form_guardar">GUARDAR</button>
        </div>
    </div>
</div>
@endsection