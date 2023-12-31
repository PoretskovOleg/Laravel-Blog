@extends('layouts.app', ['title' => 'Восстановление пароля', 'skipHeader' => true, 'skipFooter' => true])

@section('content')

    <x-auth.logo>
        <x-logo></x-logo>
    </x-auth.logo>

    <x-auth.form.status></x-auth.form.status>

    <x-auth.form title="Восстановление пароля">
        <x-form action="{{ route('password.forgot') }}">
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

            <x-form.submit-button>Отправить</x-form.submit-button>
        </x-form>

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
