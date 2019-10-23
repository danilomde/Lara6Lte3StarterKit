@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <div class="row">
        <div class="col margin-tb">          
            <h1>Usuários</h1>
        </div>
        <div class="col pull-left text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('usuarios.index') }}"><i class="fa fa-arrow-left"></i> Voltar</a>
            
          </div>           
        
    </div>
@stop

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Erro!</strong><br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">                 
      Editar usuários      
    </h3>

  </div>
  <div class="card-body">

    
        @include('usuarios.form')    

    

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