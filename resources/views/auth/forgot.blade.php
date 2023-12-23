@extends('layouts.app', ['title' => 'Восстановление пароля', 'skipHeader' => true, 'skipFooter' => true])

@section('content')
    <div class="text-center">
        <a rel="home" href="{{ route('home') }}">
            <img alt="CutCode"
                 class="w-[148px] md:w-[201px] h-[36px] md:h-[50px] inline-block"
                 src="/images/logo.svg"
            >
        </a>
    </div>
    @if(session()->has('status'))
        <p class="max-w-[640px] mt-4 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple mb-5">
            {{ session()->get('status') }}
        </p>
    @endif
    <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
        <h1 class="mb-5 text-lg font-semibold">Восстановление пароля</h1>
        <form class="space-y-3" action="{{ route('password.forgot') }}" method="POST">
            @csrf
            <input
                class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                type="email"
                required=""
                autofocus=""
                autocomplete="email"
                placeholder="E-mail"
                name="email"
                value="{{ old('email') }}"
            >
            @error('email')
            <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
            @enderror

            <button class="w-full btn btn-pink" type="submit">Отправить</button>
        </form>

        <div class="space-y-3 mt-5">
            <div class="text-xxs md:text-xs">
                <a class="text-white hover:text-white/70 font-bold"
                   href="{{ route('login') }}"
                >
                    Я вспомнил пароль
                </a>
            </div>
        </div>
    </div>

@endsection
