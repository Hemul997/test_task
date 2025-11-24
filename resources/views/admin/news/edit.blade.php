@extends('layouts.app')

@section('content_header')
    <h1>@lang('admin/operations/edit.name')</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{route('admin.news.update')}}" method="POST">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="title" value="{{$news->title}}" label="{{trans('models/news.fields.title')}}" enable-old-support/>
                <div class="row">
                    <label for="news-description">@lang('models/news.fields.description')</label>
                    <textarea name="description" id="news-description" rows="5" cols="100">
                        {{$news->description}}
                    </textarea>
                </div>
                <input type="hidden" name="id" value="{{$news->id}}">
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <x-adminlte-button class="btn-flat" type="submit" label="{{trans('admin/operations/edit.submit')}}" theme="primary" icon="fas fa-lg fa-save"/>
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