@extends('adminlte::page')

@if(!isset($user))
    @section('title', 'user｜登録')
@else
    @section('title', 'user｜編集')
@endif

@section('content_header')
    <h1>user</h1>
@stop

@section('content')
    <div class="row">
        @if(!isset($user))
            {{ Form::open(['url' => route('user.store'), 'method' => 'post', 'class' => 'form-horizontal h-adr']) }}
        @else
            {{ Form::model($user, ['route' => ['user.update', $user], 'method' => 'put', 'class' => 'form-horizontal h-adr']) }}
        @endif

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        @if(!isset($user))
                            <i class="fa fa-plus-circle"></i> user登録
                        @else
                            <i class="fa fa-plus-pencil"></i> user編集
                        @endif
                    </h3>
                    <div class="pull-right">
                        @if(!isset($user))
                            <a class="btn-sm" href="{{ route('user.index') }}"><i class="fa fa-fw fa-table"></i>一覧</a>
                        @else
                            <a class="btn-sm" href="{{ route('user.index') }}"><i class="fa fa-fw fa-users"></i>一覧</a>
                            <a class="btn-sm btn-warning" href="{{ route('user.create') }}"><i class="fa fa-fw fa-plus-circle"></i>新規登録</a>
                            <a class="btn-sm btn-info" href="{{ route('user.show', $user) }}"><i class="fa fa-fw fa-eye"></i>詳細</a>
                        @endif
                    </div>
                </div>
                <span class="p-country-name" style="display:none;">Japan</span>
                <div class="box-body">
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('name')) has-error @endif">
                        {{ Form::label('name', 'name', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('email')) has-error @endif">
                        {{ Form::label('email', 'email', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('email_verified_at')) has-error @endif">
                        {{ Form::label('email_verified_at', 'email_verified_at', ['class' => 'col-lg-2 col-sm-3 control-label']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('email_verified_at', null, ['class' => 'form-control datepicker', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('email_verified_at'))
                            <span class="help-block">{{ $errors->first('email_verified_at') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('password')) has-error @endif">
                        {{ Form::label('password', 'password', ['class' => 'col-lg-2 col-sm-3 control-label required']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('password', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12 col-sm-12 @if($errors->has('remember_token')) has-error @endif">
                        {{ Form::label('remember_token', 'remember_token', ['class' => 'col-lg-2 col-sm-3 control-label']) }}
                        <div class="col-md-8 col-sm-8">
                            {{ Form::text('remember_token', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        @if($errors->has('remember_token'))
                            <span class="help-block">{{ $errors->first('remember_token') }}</span>
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
