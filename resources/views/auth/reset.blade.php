@extends('layouts.app', ['title' => 'Восстановление пароля', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form action="{{ route('password.reset') }}" title="Восстановление пароля">
        <input type="hidden" name="token" value="{{ $token }}">

        <x-auth.form.input
            type="email"
            required
            readonly
            name="email"
            value="{{ $email }}"
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

        <x-auth.form.button>Сменить пароль</x-auth.form.button>

        <x-slot name="footer">
            <x-auth.form.footer>
                <x-auth.form.footer.item
                    name="Я вспомнил пароль"
                    route="{{ route('login') }}"
                >
                </x-auth.form.footer.item>
            </x-auth.form.footer>
        </x-slot>
    </x-auth.form>

@endsection
