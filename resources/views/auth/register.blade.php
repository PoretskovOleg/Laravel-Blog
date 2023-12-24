@extends('layouts.app', ['title' => 'Регистрация', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form action="{{ route('register') }}" title="Регистрация">
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
           type="text"
           required
           placeholder="Имя"
           name="name"
           value="{{ old('name') }}"
        ></x-auth.form.input>

        @error('name')
        <x-auth.form.error>{{ $message }}</x-auth.form.error>
        @enderror

        <x-auth.form.input
            type="password"
            required
            autocomplete="current-password"
            placeholder="Пароль"
            name="password"
        ></x-auth.form.input>

        @error('password')
        <x-auth.form.error>{{ $message }}</x-auth.form.error>
        @enderror

        <x-auth.form.input
            type="password"
            required
            autocomplete="new-password"
            placeholder="Повторите пароль"
            name="password_confirmation"
        ></x-auth.form.input>

        <x-auth.form.button>Зарегистрироваться</x-auth.form.button>

        <x-slot name="footer">
            <x-auth.form.footer>
                <x-auth.form.footer.item
                    class="underline underline-offset-4"
                    name="Войти"
                    route="{{ route('login') }}"
                >
                    Есть аккаунт?
                </x-auth.form.footer.item>
            </x-auth.form.footer>
        </x-slot>
    </x-auth.form>

@endsection
