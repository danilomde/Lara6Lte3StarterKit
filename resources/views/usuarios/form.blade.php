

@if( isset($usuario->id)  )
    {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['usuarios.update', $usuario->id], 'class' => 'form']) !!}

@else
    {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
@endif

<div class="col-6">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Senha:</strong>
                {!! Form::password('password', array('placeholder' => 'Senha','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirme a Senha:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confire a senha','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissão:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
            </div>
        </div>

        </div>
        <div class="col-12 text-right">
            <div class="form-group pull-right">
                
                @if( isset($usuario->id)  )
                    {!! Form::submit('Atualizar', ['class' => 'btn btn-success']) !!}
                @else
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                @endif


             </div>
        </div>
         {!! Form::close() !!}