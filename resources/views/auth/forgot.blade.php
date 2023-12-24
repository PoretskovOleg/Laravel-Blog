@extends('layouts.app', ['title' => 'Восстановление пароля', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-status></x-status>

    <x-auth.form action="{{ route('password.forgot') }}" title="Восстановление пароля">
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

        <x-auth.form.button>Отправить</x-auth.form.button>

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
