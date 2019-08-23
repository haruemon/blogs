
@extends('adminlte::page')

@section('title', 'ユーザ｜詳細')

@section('content_header')
    <h1>ユーザ</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-table"></i> ユーザ詳細</h3>
                    <div class="pull-right">
                        <a class="btn-sm" href="{{ route('user.index') }}"><i class="fa fa-fw fa-users"></i>一覧</a>
                        <a class="btn-sm btn-warning" href="{{ route('user.create') }}"><i class="fa fa-fw fa-plus-circle"></i>新規登録</a>
                        <a class="btn-sm btn-success" href="{{ route('user.edit', $user) }}"><i class="fa fa-fw fa-pencil"></i>編集</a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th class="col-sm-2">id</th>
                            <td class="2">{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">name</th>
                            <td class="2">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">email</th>
                            <td class="2">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">created_at</th>
                            <td class="2">{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">updated_at</th>
                            <td class="2">{{ $user->updated_at }}</td>
                        </tr>

                    </table>
                </div>
                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop


