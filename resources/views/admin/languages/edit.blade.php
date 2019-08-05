@extends('admin.layouts.main')

@section('title','Editar lenguaje')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
        </div>
        <div class="col-md-12">
            <p class="text-center">                
                {{Html::image($language->flag)}}
            </p>
        </div>
        <div class="col-md-12">
            {{Form::model($language,['route' => ['admin.languages.update',$language->id],'method'=>'put','id'=>'form_guardar'])}}
                <div class="row">
                    <div class="col-md-6">
                        {!!Form::label('abbr','Abreviación')!!}
                        {!!Form::text('abbr',null,['class'=>'form-control','required'])!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::label('name','Nombre')!!}
                        {!!Form::text('name',null,['class'=>'form-control','required'])!!}
                    </div>                    
                </div>
            {{Form::close()}}
        </div>
        <div class="col-md-12">
        <br><br>
            <a href="{{ route('admin.languages.index') }}" class="btn btn-danger">ATRAS</a>
            <button class="btn btn-primary">GUARDAR</button>
        </div>
    </div>
</div>
@endsection