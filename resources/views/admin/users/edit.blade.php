@extends('layouts.app')

@section('content_header')
    <h1>@lang('admin/operations/edit.name')</h1>
@stop

@section('plugins.TempusDominusBs4', true)


@section('content')
    @session('error')
        <div class="alert alert-default-danger" role="alert"> {{ $value }} </div>
    @endsession

    <div class="card card-primary">
        <form action="{{route('admin.users.update')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}"><i class="fa fa-arrow-left"></i> Назад</a>
                </div>

                <x-adminlte-input name="name" value="{{$user->name}}" label="{{trans('models/user.fields.name')}}" enable-old-support/>
                <x-adminlte-input name="email" type="email" value="{{$user->email}}" label="{{trans('models/user.fields.email')}}" enable-old-support/>
            </div>
            <!-- /.card-body -->

            <div class="card-body">
                <h5>@lang('models/user_profile.entity_name')</h5>
                <x-adminlte-select2 name="gender" label="{{trans('models/user_profile.fields.gender')}}">
                    @foreach(\App\Enums\UserGenderEnum::options() as $key => $value)
                        @if ($user->profile->gender->value === $key)
                            <option value="{{$key}}" selected>{{$value}}</option>
                        @else
                            <option value="{{$key}}">{{$value}}</option>
                        @endif
                    @endforeach
                </x-adminlte-select2>
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="birthday" value="{{$user->profile->birthday?->toDateString() ?? ''}}" label="{{trans('models/user_profile.fields.birthday')}}" :config="$config"/>

                <x-adminlte-input name="phone" value="{{$user->profile->phone ?? ''}}" label="{{trans('models/user_profile.fields.phone')}}" enable-old-support/>
            </div>

            <input type="hidden" name="id" value="{{$user->id}}">

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