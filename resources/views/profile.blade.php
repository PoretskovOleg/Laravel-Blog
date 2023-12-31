@extends('layouts.app', ['title' => 'Личный кабинет'])

@section('content')
    <x-profile>

        <x-form
            x-show="active === 1"
            action="{{ route('profile.index') }}"
            enctype="multipart/form-data"
        >
            @method('PUT')

            <div class="flex items-center justify-between">
                <div><input type="file" id="file" name="avatar" class="hidden">
                    <div class="mt-2">
                        <img src="{{ $avatar }}" alt="" class="rounded-full h-20 w-20 object-cover">
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button class="w-full btn btn-pink mt-2 mr-2" type="button"> Загрузить</button>
                    @if($issetAvatar)
                        <button class="w-full btn btn-outline mt-2" type="button"> Удалить</button>
                    @endif
                </div>
            </div>
            @error('avatar')
                <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="text"
                required
                name="name"
                placeholder="Имя"
                value="{{ old('name', $name) }}"
            ></x-form.input>
            @error('name')
                <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="email"
                required
                name="email"
                placeholder="E-mail"
                value="{{ old('email', $email) }}"
            ></x-form.input>
            @error('email')
                <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.submit-button>Сохранить</x-form.submit-button>

            <x-profile.success display="{{ session('profile_success') ? 'block' : 'none' }}">Профиль сохранен</x-profile.success>
        </x-form>

        <x-form
            x-show="active === 2"
            action="{{ route('profile.password') }}"
        >
            @method('PUT')

            <x-form.input
                type="password"
                required
                autocomplete="current-password"
                placeholder="Текущий пароль"
                name="password"
            ></x-form.input>
            @error('password')
                <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="password"
                required
                autocomplete="new-password"
                placeholder="Новый пароль"
                name="new_password"
            ></x-form.input>
            @error('new_password')
                <x-form.error>{{ $message }}</x-form.error>
            @enderror

            <x-form.input
                type="password"
                required
                autocomplete="new-password"
                placeholder="Повторите пароль"
                name="new_password_confirmation"
            ></x-form.input>

            <x-form.submit-button>Сменить пароль</x-form.submit-button>

            <x-profile.success display="{{ session('password_success') ? 'block' : 'none' }}">Новый пароль установлен</x-profile.success>

        </x-form>

    </x-profile>
@endsection
