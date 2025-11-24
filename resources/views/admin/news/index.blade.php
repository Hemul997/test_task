@extends('layouts.app')

@section('title', 'Example Form')

@section('content_header')
    <h1>@lang('models/news.entity_plural_name')</h1>
@stop

@section('content')
    <div class="card mt-5">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        @session('errors')
            <div class="alert alert-danger" role="alert"> {{ $value }}</div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('admin.news.create') }}"> <i class="fa fa-plus"></i>@lang('admin/operations/index.create_entry')</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
            <tr>
                <th>№</th>
                <th>@lang('models/news.fields.title')</th>
                <th>@lang('models/news.fields.description')</th>
                <th>@lang('admin/operations/index.actions')</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($news as $news_item)
                <tr>
                    <td>{{ $news_item->id }}</td>
                    <td>{{ $news_item->title }}</td>
                    <td>{{ $news_item->description }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" target="_blank" href="{{ route('admin.news.show', $news_item->id)}}"><i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-info btn-sm" target="_blank" href="{{ route('admin.news.edit', $news_item->id)}}"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('admin.news.destroy', $news_item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
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