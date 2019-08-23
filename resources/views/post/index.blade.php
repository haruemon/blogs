@extends('adminlte::page')

@section('title', 'post｜一覧')

@section('content_header')
    <h1>post</h1>
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
            {{Form::open(['url' => route('post.index'), 'method' => 'get', 'role' => 'form', 'id' => 'search'])}}
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>タイトル</label>
                        {{ Form::text('title', \Request::input('title'), ['id' => 'form-title', 'class' => 'form-control pull-right', 'placeholder' => 'タイトル']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>本文</label>
                        {{ Form::textarea('body', \Request::input('body'), ['id' => 'form-body', 'class' => 'form-control pull-right', 'placeholder' => '本文']) }}
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
                    <h3 class="box-title"><i class="fa fa-table"></i> post一覧</h3>
                    <span class="text-blue">&nbsp;&nbsp;{{ $posts->total() }}件</span>
                    <a class="btn btn-warning pull-right" href="{{ route('post.create') }}"><i class="fa fa-fw fa-plus-circle"></i>新規登録</a>
                    <a class="btn btn-light pull-right" href="{{ route('csv_import.index', 'post') }}"><i class="fa fa-fw fa-plus-circle"></i>CSV取込</a>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>id</th>
                            <th>ユーザID</th>
                            <th>タイトル</th>
                            <th>本文</th>
                            <th>ステータス</th>
                            <th>公開日</th>
                            <th>deleted_at</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th></th>
                        </tr>
                        @if($posts->total() !==  0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ $post->published_at }}</td>
                                    <td>{{ $post->deleted_at }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>
                                        <div class="pull-right action-btns">
                                            <a class="btn-sm btn-warning" href="{{ route('post.show', $post) }}"><i class="fa fa-fw fa-eye"></i>詳細</a>
                                            <a class="btn-sm btn-success" href="{{ route('post.edit', $post) }}"><i class="fa fa-fw fa-pencil"></i>編集</a>
                                            <a class="btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{ $post->id }}"><i class="fa fa-fw fa-trash"></i>削除</a>
                                            {{ Form::open(['url' => route('post.destroy', $post), 'method' => 'delete', 'class' => 'inline']) }}
                                            @include('adminlte::partials.delete_modal', ['id' => $post->id])
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
