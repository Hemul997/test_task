@extends('layouts.app')

@section('title', 'Example Form')

@section('content_header')
    <h1>@lang('admin/operations/index.create_entry')</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{route('admin.news.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <x-adminlte-input name="title" label="Название" enable-old-support/>
                </div>
                <div class="form-group">
                    <x-adminlte-textarea name="description" label="Описание" {{--placeholder="Password"--}} enable-old-support/>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <x-adminlte-button class="btn-flat" type="submit" label="Сохранить" theme="primary" icon="fas fa-lg fa-save"/>
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