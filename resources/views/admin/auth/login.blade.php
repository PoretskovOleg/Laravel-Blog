@extends('layouts.admin', ['title' => 'Авторизация', 'skipHeader' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form title="Вход в аккаунт">
        <x-form action="{{ route('admin.login') }}">
            <x-form.input
                required
                autofocus
                placeholder="Логин"
                name="login"
                value="{{ old('login') }}"
            ></x-form.input>

            @error('login')
            <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="password"
                required
                autocomplete="current-password"
                placeholder="Пароль"
                name="password"
            ></x-form.input>

            <x-form.submit-button>Войти</x-form.submit-button>
        </x-form>

    </x-auth.form>

@endsection
