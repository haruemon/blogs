@extends('adminlte::page')

@section('title', 'user｜一覧')

@section('content_header')
    <h1>user</h1>
@stop

@section('content')

    <div class="box box-default with-border collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title"><a data-widget="collapse" href="#" style="color: inherit;">検索</a></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">+</button>
            </div>
        </div>
        <div class="box-body" style="display: none;">
            {{Form::open(['url' => route('user.index'), 'method' => 'get', 'role' => 'form', 'id' => 'search'])}}
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>name</label>
                        {{ Form::text('name', \Request::input('name'), ['id' => 'form-name', 'class' => 'form-control pull-right', 'placeholder' => 'name']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>email</label>
                        {{ Form::text('email', \Request::input('email'), ['id' => 'form-email', 'class' => 'form-control pull-right', 'placeholder' => 'email']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>password</label>
                        {{ Form::text('password', \Request::input('password'), ['id' => 'form-password', 'class' => 'form-control pull-right', 'placeholder' => 'password']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>remember_token</label>
                        {{ Form::text('remember_token', \Request::input('remember_token'), ['id' => 'form-remember_token', 'class' => 'form-control pull-right', 'placeholder' => 'remember_token']) }}
                    </div>
                </div>
            </div>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">検索</button>
            <button type="button" class="btn pull-right btn-default clearForm" style="margin-right: 5px;">リセット</button>
        </div>
        {{ Form::close() }}
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-table"></i> user一覧</h3>
                    <span class="text-blue">&nbsp;&nbsp;{{ $users->total() }}件</span>
                    <a class="btn btn-warning pull-right" href="{{ route('user.create') }}"><i class="fa fa-fw fa-plus-circle"></i>新規登録</a>
                    <a class="btn btn-light pull-right" href="{{ route('csv_import.index', 'user') }}"><i class="fa fa-fw fa-plus-circle"></i>CSV取込</a>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>created_at</th>
                            <th>updated_at</th>

                            <th></th>
                        </tr>
                        @if($users->total() !==  0)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>

                                    <td>
                                        <div class="pull-right action-btns">
                                            <a class="btn-sm btn-warning" href="{{ route('user.show', $user) }}"><i class="fa fa-fw fa-eye"></i>詳細</a>
                                            <a class="btn-sm btn-success" href="{{ route('user.edit', $user) }}"><i class="fa fa-fw fa-pencil"></i>編集</a>
                                            <a class="btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{ $user->id }}"><i class="fa fa-fw fa-trash"></i>削除</a>
                                            {{ Form::open(['url' => route('user.destroy', $user), 'method' => 'delete', 'class' => 'inline']) }}
                                            @include('adminlte::partials.delete_modal', ['id' => $user->id])
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td>表示可能なデータはありません。</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="box-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
