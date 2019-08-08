@extends('admin.layouts.main')

@section('title','Crear categoria')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
        </div>
        <div class="col-md-12">
            {{Form::open(['route'=>'admin.categories.store','id'=>'form_guardar'])}}
                <div class="row">
                    <div class="col-md-12">
                        {!!Form::label('name','Nombre')!!}
                        {!!Form::text('name',null,['class'=>'form-control','required'])!!}
                    </div>                    
                </div>
            {{Form::close()}}
        </div>
        <div class="col-md-12">
        <br><br>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">ATRAS</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" form="form_guardar">GUARDAR</button>
        </div>
    </div>
</div>
@endsection