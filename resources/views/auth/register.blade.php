@extends('layouts.app', ['title' => 'Регистрация', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form title="Регистрация">
        <x-form action="{{ route('register') }}">
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
                type="text"
                required
                placeholder="Имя"
                name="name"
                value="{{ old('name') }}"
            ></x-form.input>

            @error('name')
            <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="password"
                required
                autocomplete="current-password"
                placeholder="Пароль"
                name="password"
            ></x-form.input>

            @error('password')
            <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="password"
                required
                autocomplete="new-password"
                placeholder="Повторите пароль"
                name="password_confirmation"
            ></x-form.input>

            <x-form.submit-button>Зарегистрироваться</x-form.submit-button>
        </x-form>

        <x-auth.form.footer>
            <x-auth.form.footer.item
                class="underline underline-offset-4"
                name="Войти"
                route="{{ route('login') }}"
            >
                Есть аккаунт?
            </x-auth.form.footer.item>
        </x-auth.form.footer>
    </x-auth.form>

@endsection
