@extends('layouts.app')

@section('content_header')
    <h1>@lang('admin/operations/show.name')</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.news.index') }}"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>@lang('models/news.fields.title'):</strong> <br/>
                        {{ $news->title }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>@lang('models/news.fields.description'):</strong> <br/>
                        {{ $news->description }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop