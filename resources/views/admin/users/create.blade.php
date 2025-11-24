@extends('layouts.app')

@section('content_header')
    <h1>@lang('admin/operations/create.name')</h1>
@stop

@section('plugins.TempusDominusBs4', true)


@section('content')
    @session('error')
        <div class="alert alert-default-danger" role="alert"> {{ $value }} </div>
    @endsession

    <div class="card card-primary">
        <form action="{{route('admin.users.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <x-adminlte-input name="name" label="{{trans('models/user.fields.name')}}" enable-old-support/>
                <x-adminlte-input name="email" type="email" label="{{trans('models/user.fields.email')}}" enable-old-support/>
                <x-adminlte-input name="password" type="password" label="{{trans('models/user.fields.password')}}" enable-old-support/>
            </div>
            <!-- /.card-body -->

            <div class="card-body">
                <h5>@lang('models/user_profile.entity_name')</h5>
                <x-adminlte-select2 name="gender">
                    @foreach(\App\Enums\UserGenderEnum::options() as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </x-adminlte-select2>
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="birthday" label="{{trans('models/user_profile.fields.birthday')}}" :config="$config"/>
                <x-adminlte-input name="phone" label="{{trans('models/user_profile.fields.phone')}}" enable-old-support/>
            </div>

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