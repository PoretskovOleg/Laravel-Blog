@extends('layouts.app', ['title' => 'Авторизация', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form.status></x-auth.form.status>

    <x-auth.form title="Вход в аккаунт">
        <x-form action="{{ route('login') }}">
            <x-form.input
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="E-mail"
                name="email"
                value="{{ old('email') }}"
            ></x-form.input>

            @error('email')
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

        <x-auth.form.footer>
            <x-auth.form.footer.item
                name="Забыли пароль?"
                route="{{ route('password.forgot') }}"
            >
            </x-auth.form.footer.item>

            <x-auth.form.footer.item
                name="Регистрация"
                route="{{ route('register') }}"
            >
            </x-auth.form.footer.item>
        </x-auth.form.footer>

    </x-auth.form>

@endsection
