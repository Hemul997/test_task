@extends('layouts.app')

@section('content_header')
    <h1>@lang('admin/operations/create.name')</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{route('admin.news.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="title" label="{{trans('models/news.fields.title')}}" enable-old-support/>
                <x-adminlte-textarea name="description" label="{{trans('models/news.fields.description')}}" enable-old-support/>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <x-adminlte-button class="btn-flat" type="submit" label="{{trans('admin/operations/create.submit')}}" theme="primary" icon="fas fa-lg fa-save"/>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop