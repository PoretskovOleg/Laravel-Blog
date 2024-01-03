@extends('layouts.app', ['title' => 'Восстановление пароля', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form title="Восстановление пароля">
        <x-form action="{{ route('password.reset') }}">
            <input type="hidden" name="token" value="{{ $token }}">

            <x-form.input
                type="email"
                required
                readonly
                name="email"
                value="{{ $email }}"
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

            <x-form.submit-button>Сменить пароль</x-form.submit-button>
        </x-form>

        <x-auth.form.footer>
            <x-auth.form.footer.item
                name="Я вспомнил пароль"
                route="{{ route('login') }}"
            >
            </x-auth.form.footer.item>
        </x-auth.form.footer>

    </x-auth.form>

@endsection
