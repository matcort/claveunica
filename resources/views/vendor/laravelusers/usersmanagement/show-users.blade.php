@extends('laravelusers::layouts.app')

@section('template_title')
  Mostrando Usuarios
@endsection

@section('template_linked_css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Mostrando todos los usuarios
                            <a href="/users/create" class="btn btn-default btn-sm pull-right">
                                <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                Crear Usuario
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">

                        @include('laravelusers::partials.form-status')

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Nombre</td>
                                        <td>Run</td>
                                        <td class="hidden-xs">Email</td>
                                        <td class="hidden-sm hidden-xs">Creado</td>
                                        <td class="hidden-sm hidden-xs">Actualizado</td>
                                        <td>Acciones</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->run}}</td>
                                            <td class="hidden-xs">{{$user->email}}</td>
                                            <td class="hidden-sm hidden-xs">{{$user->created_at}}</td>
                                            <td class="hidden-sm hidden-xs">{{$user->updated_at}}</td>
                                            <td>
                                                {!! Form::open(array('url' => 'users/' . $user->id, 'class' => '')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Eliminar<span><span class="hidden-xs hidden-sm"></span><span class="hidden-xs"> Usuario</span>', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('users/' . $user->id) }}">
                                                    <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span>Ver</span> <span class="hidden-sm hidden-xs"></span> <span class="hidden-xs">Usuario</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('users/' . $user->id . '/edit') }}">
                                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span>Editar</span> <span class="hidden-sm hidden-xs"></span> <span class="hidden-xs">Usuario</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('laravelusers::modals.modal-delete')

@endsection

@section('template_scripts')
    @if (count($users) > 10)
        @include('laravelusers::scripts.datatables')
    @endif
    @include('laravelusers::scripts.delete-modal-script')
    @include('laravelusers::scripts.save-modal-script')
@endsection