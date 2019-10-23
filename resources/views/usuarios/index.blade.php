@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <div class="row">
        <div class="col margin-tb">          
            <h1>Usuários</h1>
        </div>
        <div class="col pull-left text-right">
            @can('users-create')
              <a class="btn btn-success btn-sm" href="{{ route('usuarios.create') }}"><i class="fa fa-plus"></i> Usuário</a>
            @endcan
          </div>           
        
    </div>
@stop

@section('content')


@if ($message = Session::get('success'))
    <script>
      document.addEventListener("DOMContentLoaded", function(event) {
        Swal.fire({
          title: 'Sucesso!',
          text:  '{{ $message }}',
          type: 'success',
          confirmButtonText: 'Ok!'
        })
      });
    </script>
@endif




    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">                 
            Lista de Usuários
            @php
              if( (isset( $_GET['search'])) AND (  $_GET['search'] != '' ) ){
                echo ' → Pesquisando: ' . $_GET['search'];
              }              
            @endphp
            → Total: {{ $users->count() }}
            
          </h3>

        </div>
        <div class="card-body">

        <table class="table table-striped">
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Permissão</th>
            <th width="280px">Ações</th>
          </tr>
          @foreach ($users as $key => $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                      <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                  @endif
              </td>

              <td>
                      
                  <a class="btn btn-sm btn-info" href="{{ route('usuarios.show',$user->id) }}"><i class="fa fa-eye"></i> Ver</a>
                  
                      @can('users-edit')
                        <a class="btn btn-sm btn-primary" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa fa-edit"></i> Editar</a>
                      @endcan

                      @can('users-delete')
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Modaldeletebtn" data-id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i>  Deletar</button>                    
                      @endcan
              

              </td>
            </tr>
          @endforeach
          </table>
        
        </div>
        <!-- /.card-body -->
        <div class="card-footer ">
        <div class="row justify-content-center">
          <div class="col-2 ">
            {!! $users->render() !!}
          </div>
        </div>
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->



      @can('users-delete')
        <div class="modal fade" id="Modaldeletebtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">Tem certeza que deseja deletar esse registro?</h4>
              </div><!-- modal-header -->
              
                <div class="modal-footer">

                  <div class="col-6">
                    <button type="button" class="btn btn-default col-12" data-dismiss="modal"> <i class="fa fa-ban" aria-hidden="true"></i>  Não</button>
                  </div>

                  <div class="col-6">
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id ?? ''],'style'=>'display:inline','class'=>'formDelete']) !!}                       
                        {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>   Sim', ['class' => 'btn btn-danger col-12 ', 'type' => 'submit' ]) }}
                    {!! Form::close() !!}
                  </div>
              </div><!-- modal-footer -->
            </div><!-- modal-content -->
          </div><!--modal-dialog -->
        </div><!-- modal -->
      @endcan
  
@stop