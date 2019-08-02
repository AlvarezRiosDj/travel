@extends('admin.layouts.main')

@section('title','Crear Usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <div class="col-md-12">
            {{Form::model($user, ['route' => ['admin.users.update', $user->id],'method'=>'put','id'=>'form_guardar'])}}
                <div class="row">
                    @include('admin.users.form')
                    <div class="col-md-12">
                        <div class="form-group">
                            {!!Form::label('status', 'Contraseña')!!}
                            {!!Form::select('status', ['1' => 'HABILITADO', '0' => 'DESHABILITADO'],null,['class'=>'form-control'])!!}
                        </div>
                    </div> 

                    <div class="col-md-3">
                        <form action="">
                            <select name="select_group[]" id="select_group" class="form-control" multiple size="10">
                                @foreach($groups as $group)
                                    
                                    @php
                                        $existencia = 'no';
                                    @endphp

                                    @foreach($grupos_usuarios as $g)                                        

                                        @if($group->id == $g->id)
                                            @php
                                                $existencia = 'si';
                                            @endphp                                            
                                        @endif                                     

                                    @endforeach

                                    @if($existencia=='no')
                                        <option value="{{ $group->id }}">{{ $group->name  }}</option>
                                    @endif


                                @endforeach
                            </select>
                        </form>
                        
                    </div>
                    <div>
                        <span class="fa fa-chevron-right btn btn-primary" id="btn_add_group"></span><br><br>
                        <span class="fa fa-chevron-left btn btn-primary" id="btn_rest_group"></span>                        
                    </div>

                    <div class="col-md-3">
                        <select name="select_group_add[]" id="select_group_add" class="form-control" multiple size="10">
                            @foreach($grupos_usuarios as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                            @endforeach
                        </select>
                    </div>                                    
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <br>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-danger">ATRAS</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary" id="btn_guardar_form" form="form_guardar">GUARDAR</button>
                </div>
            </div>            
        </div>

    </div>
</div>
@endsection


@section('script')
<script>
    

    var select_group = document.getElementById('select_group'),
    select_group_add = document.getElementById('select_group_add')


   document.getElementById('btn_add_group').addEventListener('click',()=>{


       for(let i=0;i<select_group.options.length;i++)
       {
           
            if(select_group.options[i].selected)
            {
               
                let opt = document.createElement('option');
                opt.value = select_group.options[i].value;
                opt.innerHTML = select_group.options[i].text;               
              
                select_group_add.appendChild(opt)
            }

       }

       eliminar_seleccionados(select_group) 


   })

   document.getElementById('btn_rest_group').addEventListener('click',()=>{
       for(let i=0;i<select_group_add.options.length;i++)
       {
           if(select_group_add.options[i].selected)
           {
                let opt = document.createElement('option');
                opt.value = select_group_add.options[i].value;
                opt.innerHTML = select_group_add.options[i].text;               
                select_group.appendChild(opt)

           }
       }

       eliminar_seleccionados(select_group_add)    


   })


function eliminar_seleccionados(selector)
{
    var continuar=true

       while(continuar){
          
            let contador=0
            for(let j=0;j<selector.options.length;j++)
            {
                if(selector.options[j].selected)
                {
                    selector.remove(j) 
                    contador++
                }
            }
            if(contador==0)
            {
                continuar=false
            }
            
       }
}


document.getElementById('btn_guardar_form').addEventListener('click',(e)=>{
    e.preventDefault()
    for(let i=0;i<select_group_add.options.length;i++)
       {
        select_group_add.options[i].selected = true           
       }
    document.getElementById('form_guardar').submit()
})


</script>
@endsection