@extends('admin.layouts.main')

@section('title','Editar lenguaje')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            @include('admin.layouts.errors')
        </div>
        <div class="col-md-12">
            <p class="text-center">                
                {{Html::image($language->flag)}}
            </p>
        </div>
        <div class="col-md-12">
            {{Form::model($language,['route' => ['admin.languages.update',$language->abbr],'method'=>'PUT','id'=>'form_guardar'])}}
                <div class="row">

                    <div class="col-md-12 text-center">
                        <br>
                        <figure class="figure">
                            <img src="..." id=output class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption">flag</figcaption>
                        </figure>
                    </div>

                    <div class="col-md-4">
                        {!!Form::label('abbr','Abreviación')!!}
                        {!!Form::text('abbr',null,['class'=>'form-control','required'])!!}
                    </div>
                    <div class="col-md-4">
                        {!!Form::label('name','Nombre')!!}
                        {!!Form::text('name',null,['class'=>'form-control','required'])!!}
                    </div> 
                    <div class="col-md-4">
                        {!!Form::label('status','Estado')!!}
                        {!!Form::select('status', ['1' => 'HABILITADO', '0' => 'DESHABILITADO'],null,['class'=>'form-control'])!!}
                    </div>                  
                </div>
            {{Form::close()}}
        </div>
        <div class="col-md-12">
        <br><br>
            <a href="{{ route('admin.languages.index') }}" class="btn btn-danger">ATRAS</a>
            <button class="btn btn-primary" form="form_guardar">GUARDAR</button>
        </div>
    </div>
</div>
@endsection