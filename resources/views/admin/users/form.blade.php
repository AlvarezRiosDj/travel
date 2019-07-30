<div class="col-md-12">
    <div class="form-group">
        {!!Form::label('name', 'Nombres y Apellidos')!!}
        {!!Form::text('name', null,['class'=>'form-control','required'])!!}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
    {!!Form::label('email', 'Correo Electronico')!!}
        {!!Form::email('email', null,['class'=>'form-control','required'])!!}
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
    {!!Form::label('password', 'Contraseña')!!}
        {!!Form::password('password', ['class' => 'form-control'])!!}
    </div>
</div>                    
