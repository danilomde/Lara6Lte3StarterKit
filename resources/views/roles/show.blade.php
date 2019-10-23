@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <div class="row">
        <div class="col margin-tb">          
            <h1>Permissões</h1>
        </div>
        <div class="col pull-left text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Voltar</a>
            @can('roles-create')
              <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Permissão</a>
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
      Ver permissão           
    </h3>

   

   
  </div>
  <div class="card-body">
  <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <strong>Permissões:</strong>
                
                
                @if(!empty($rolePermissions))
                    <ul>
                    @foreach($rolePermissions as $v)
                        <li class="label label-success">{{ $v->name }}</li> 
                    @endforeach
                    </ul>
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