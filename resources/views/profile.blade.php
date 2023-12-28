@extends('layouts.app', ['title' => 'Личный кабинет'])

@section('content')
    <div class="md:flex md:items-start md:justify-between md:space-x-4" x-data="{active: {{ session('activeTab', 1) }} }">
        <div class="md:w-1/2 md:my-0 my-4 w-full p-2 xs:p-4 md:p-8 2xl:p-12 rounded-[20px] bg-purple">
            <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 1}" @click="active = 1"> Редактировать профиль</div>
            <div class="p-4 cursor-pointer rounded-md" :class="{'bg-pink': active === 2}" @click="active = 2"> Изменить пароль</div>
        </div>
        <div class="w-full p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
            <form class="space-y-3" x-show="active === 1" action="{{ route('profile.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                       type="text"
                       required
                       name="name"
                       placeholder="Имя"
                       value="{{ old('name', $name) }}"
                >
                @error('name')
                <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                       type="email"
                       required
                       name="email"
                       placeholder="E-mail"
                       value="{{ old('email', $email) }}"
                >
                @error('email')
                <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <button class="w-full btn btn-pink" type="submit"> Сохранить</button>

                <div>
                    <div class="text-center p-4 my-4 rounded-lg shadow-xl bg-card" style="display: {{ session('form_1') ? 'block' : 'none' }};">
                        Профиль сохранен
                    </div>
                </div>
            </form>
            <form class="space-y-3" x-show="active === 2" action="{{ route('profile.password') }}" method="POST">
                @csrf
                @method('PUT')

                <input class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                       type="password"
                       required
                       autocomplete="current-password"
                       placeholder="Текущий пароль"
                       name="password"
                >
                @error('password')
                <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <input
                    class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Новый пароль"
                    name="new_password"
                >
                @error('new_password')
                <div class="mt-3 text-pink text-xxs xs:text-xs">{{ $message }}</div>
                @enderror

                <input
                    class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/10 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Повторите пароль"
                    name="new_password_confirmation"
                >

                <button class="w-full btn btn-pink" type="submit"> Сменить пароль</button>

                <div>
                    <div class="text-center p-4 my-4 rounded-lg shadow-xl bg-card" style="display: {{ session('form_2') ? 'block' : 'none' }};">
                        Новый пароль установлен
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
