@if( ! empty( $role->id ) )
    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id], 'class' => 'form']) !!}
@else
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
@endif

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <strong>Nome da Função:</strong>
                {!! Form::text('name', @$role->name, array('placeholder' => 'Nome da Função','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <strong>Permissões:</strong>
            <br/>
            <div class="col-2">
                @foreach($permission as $key => $value)

                    @if($key > 0)
                        @if(($key % 11) == 0)
                            </div>
                            <div class="col-md-2">  
                        @endif
                    @endif

                    <label>
                    @if( ! empty( $role->id ) )
                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions ?? '') ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}
                    @else
                        {{ Form::checkbox('permission[]', $value->id, null, array('class' => 'name')) }}
                        {{ $value->name }}
                    @endif
                        
                    </label>
                    
                    <br/>
                @endforeach
            </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        @if( ! empty($role->id))
            {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}   
        @else
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}   
        @endif

    </div>

{!! Form::close() !!}