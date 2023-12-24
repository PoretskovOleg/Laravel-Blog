@extends('layouts.app', ['title' => 'Авторизация', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-status></x-status>

    <x-auth.form action="{{ route('login') }}" title="Вход в аккаунт">
        <x-auth.form.input
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="E-mail"
            name="email"
            value="{{ old('email') }}"
        ></x-auth.form.input>

        @error('email')
        <x-auth.form.error>{{ $message }}</x-auth.form.error>
        @enderror

        <x-auth.form.input
            type="password"
            required
            autocomplete="current-password"
            placeholder="Пароль"
            name="password"
        ></x-auth.form.input>

        <x-auth.form.button>Войти</x-auth.form.button>

        <x-slot name="footer">
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
        </x-slot>

    </x-auth.form>

@endsection
