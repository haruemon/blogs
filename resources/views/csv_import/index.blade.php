@extends('adminlte::page')

@section('title', $model_name . ' | CSV Import')

@section('content_header')
    <h1>{{ $model_name }} CSV Import</h1>
@stop

@section('content')

    @if (session('error'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('error') }}</li>
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif

    <p>一行目は、下記のカラム名を入力してください</p>
    <p style="word-break : break-all;">{{ implode(',', $heading_row) }}</p>
    <p>ファイルを選択してください</p>
    <form role="form" method="post" action="{{ $table_name }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="file" name="csv_file">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">インポート</button>
        </div>
    </form>
    <a class="btn btn-info pull-right" href="{{ route(strtolower($model_name) . '.index') }}"><i class="fa fa-fw fa-plus-circle"></i>戻る</a>
@stop

@section('css')
@stop

@section('js')
@stop
