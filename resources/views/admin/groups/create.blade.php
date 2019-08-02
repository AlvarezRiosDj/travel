@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            @include('admin.layouts.errors')
        </div>
        <div class="col-md-12">
            {{ Form::open(['route' => 'admin.groups.store','id'=>'form_guardar']) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('name', 'Nombres de grupo')!!}
                            {!!Form::text('name', null,['class'=>'form-control','required'])!!}
                        </div>
                    </div>                    
                </div>
            {{ Form::close() }}
           
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.groups.index') }}" class="btn btn-danger">ATRAS</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary" form="form_guardar">GUARDAR</button>
        </div>
    </div>
</div>
@endsection