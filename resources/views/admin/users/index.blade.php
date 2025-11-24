@extends('layouts.app')

@section('title', 'Example Form')

@section('content_header')
    <h1>@lang('models/user.entity_plural_name')</h1>
@stop

@section('content')
    <div class="card mt-5">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
        {{--<div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('admin.users.create') }}"> <i class="fa fa-plus"></i>Создать запись</a>
        </div>--}}

        <table class="table table-bordered table-striped mt-4">
            <thead>
            <tr>
                <th>№</th>
                <th>@lang('models/user.fields.name')</th>
                <th>@lang('models/user.fields.email')</th>
                <th>@lang('admin/operations/index.actions')</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">@lang('admin/operations/index.no_entries_to_show')</td>
                </tr>
            @endforelse
            </tbody>

        </table>

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop