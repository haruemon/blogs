@extends('adminlte::page')

@if(!isset($post))
    @section('title', 'post｜登録')
@else
    @section('title', 'post｜編集')
@endif

@section('content_header')
    <h1>post</h1>
@stop

@section('content')
    <div class="row">
        @if(!isset($post))
            {{ Form::open(['url' => route('post.store'), 'method' => 'post', 'class' => 'form-horizontal h-adr']) }}
        @else
            {{ Form::model($post, ['route' => ['post.update', $post], 'method' => 'put', 'class' => 'form-horizontal h-adr']) }}
        @endif

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        @if(!isset($post))
                            <i class="fa fa-plus-circle"></i> post登録
                        @else
                            <i class="fa fa-plus-pencil"></i> post編集
                        @endif
                    </h3>
                    <div class="pull-right">
                        @if(!isset($post))
                            <a class="btn-sm" href="{{ route('post.index') }}"><i class="fa fa-fw fa-table"></i>一覧</a>
                        @else
                            <a class="btn-sm" href="{{ route('post.index') }}"><i class="fa fa-fw fa-users"></i>一覧</a>
                            <a class="btn-sm btn-warning" href="{{ route('post.create') }}"><i class="fa fa-fw fa-plus-circle"></i>新規登録</a>
                            <a class="btn-sm btn-info" href="{{ route('post.show', $post) }}"><i class="fa fa-fw fa-eye"></i>詳細</a>
                        @endif
                    </div>
                </div>
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('user_id')) has-error @endif">
                        {{ Form::label('user_id', 'ユーザID', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('user_id'))
                            <span class="help-block">{{ $errors->first('user_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('title')) has-error @endif">
                        {{ Form::label('title', 'タイトル', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('body')) has-error @endif">
                        {{ Form::label('body', '本文', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                        </div>
                        @if($errors->has('body'))
                        <span class="help-block">{{ $errors->first('body') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('status')) has-error @endif">
                        {{ Form::label('status', 'ステータス', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('status', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('status'))
                            <span class="help-block">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('published_at')) has-error @endif">
                        {{ Form::label('published_at', '公開日', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('published_at', null, ['class' => 'form-control datepicker', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('published_at'))
                            <span class="help-block">{{ $errors->first('published_at') }}</span>
                        @endif
                    </div>
                </div>
                <div class="box-footer text-center">
                    {{ Form::submit('送信', ['class' => 'btn-sm btn-warning']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(function () {
            $('.datepicker').datepicker( {
                format: 'yyyy-mm-dd',
                language: 'ja'
            } );
        })
    </script>
@stop
