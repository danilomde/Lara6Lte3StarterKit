@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <div class="row">
        <div class="col margin-tb">          
            <h1>Usuários</h1>
        </div>
        <div class="col pull-left text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.index') }}"><i class="fa fa-arrow-left"></i> Voltar</a>
            @can('users-create')
              <a class="btn btn-success btn-sm" href="{{ route('usuarios.create') }}"><i class="fa fa-plus"></i> Usuários</a>
            @endcan
          </div>           
        
    </div>
@stop

@section('content')

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">                 
      Ver usuários           
    </h3>

   

   
  </div>
  <div class="card-body">
  <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $usuario->name }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {{ $usuario->email }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Permissão:</strong>
                @if(!empty($usuario->getRoleNames()))
                    @foreach($usuario->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
  </div>
        <!-- /.card-body -->
        <div class="card-footer ">
        <div class="row justify-content-center">
          <div class="col-2 ">
            
          </div>
        </div>
          
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->







@endsection