
@extends('adminlte::page')

@section('title', 'post｜詳細')

@section('content_header')
    <h1>post</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-table"></i> post詳細</h3>
                    <div class="pull-right">
                        <a class="btn-sm" href="{{ route('post.index') }}"><i class="fa fa-fw fa-users"></i>一覧</a>
                        <a class="btn-sm btn-warning" href="{{ route('post.create') }}"><i class="fa fa-fw fa-plus-circle"></i>新規登録</a>
                        <a class="btn-sm btn-success" href="{{ route('post.edit', $post) }}"><i class="fa fa-fw fa-pencil"></i>編集</a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th class="col-sm-2">id</th>
                            <td class="2">{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">ユーザID</th>
                            <td class="2">{{ $post->user_id }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">タイトル</th>
                            <td class="2">{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">本文</th>
                            <td class="2">{{ $post->body }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">ステータス</th>
                            <td class="2">{{ $post->status }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">公開日</th>
                            <td class="2">{{ $post->published_at }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">deleted_at</th>
                            <td class="2">{{ $post->deleted_at }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">created_at</th>
                            <td class="2">{{ $post->created_at }}</td>
                        </tr>
                        <tr>
                            <th class="col-sm-2">updated_at</th>
                            <td class="2">{{ $post->updated_at }}</td>
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


