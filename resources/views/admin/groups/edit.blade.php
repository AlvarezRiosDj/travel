@extends('admin.layouts.main')

@section('title','Editar grupo')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
        </div>
        <div class="col-md-12">
            {{Form::model($group, ['route' => ['admin.groups.update', $group->id],'method'=>'put','id'=>'form_guardar'])}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('name', 'Nombres y Apellidos')!!}
                            {!!Form::text('name', null,['class'=>'form-control','required'])!!}
                        </div>
                    </div>                  
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-md-12">
            <a href="/groups" class="btn btn-danger">ATRAS</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" form="form_guardar">GUARDAR</button>
        </div>
    </div>
</div>
@endsection


